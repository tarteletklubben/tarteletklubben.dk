<?php

class UserController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth', array('except' => array('getGoogleAuth', 'getCreated', 'getNotActivated', 'getProfile')));
		$this->beforeFilter('admin', array('only' => 'getActivate'));
	}

	public function getList()
	{
		$users = User::where('activated', true)->orderBy('name')->orderBy('surname')->get();
		$users->load('roles');
		$users_not_activated = User::where('activated', false)->orderBy('name')->get();
		return View::make('user-list')->with('users', $users)->with('users_not_activated', $users_not_activated);
	}

	public function getProfile($id = null)
	{
		if($id)
			return View::make('profile')->with('user', User::findOrFail($id));
		else if(Auth::check())
			return View::make('profile')->with('user', Auth::user());
		else
			return Redirect::to('/');
	}

	public function getActivate($id)
	{
		$user = User::findOrFail($id);
		$user->activated = 1;
		$user->save();

		return Redirect::action('UserController@getProfile', $id);
	}

	public function getCreated()
	{
		return View::make('just-created');
	}

	public function getNotActivated()
	{
		return View::make('not-activated');
	}

	public function getLogout()
	{
		if(Auth::check())
			Auth::logout();

		return Redirect::to('/');
	}

	public function getGoogleAuth()
        {
		$code = Input::get( 'code' );
		$googleService = OAuth::consumer( 'Google' );

		if ( !empty( $code ) ) {
			$token = $googleService->requestAccessToken( $code );
			$result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );

			$user = User::where('email', '=', $result['email'])->first();

			if($user && $user->activated)
			{
				$user->profile_picture = $result['picture'];
				$user->save();
				Auth::login($user);
				return Redirect::intended(action('UserController@getProfile'));
			}
			else if($user && !$user->activated)
			{
				return Redirect::action('UserController@getNotActivated');
			}
			else
			{
				$user = new User();
				$user->name = $result['given_name'];
				$user->surname = $result['family_name'];
				$user->email = $result['email'];
				$user->profile_picture = $result['picture'];
				$user->save();
				$user->roles()->attach(Role::where('name', 'Gæst')->first());
				return Redirect::action('UserController@getCreated');
			}
		}
		else {
			$url = $googleService->getAuthorizationUri();
			return Redirect::to((string)$url);
		}
	}
}
