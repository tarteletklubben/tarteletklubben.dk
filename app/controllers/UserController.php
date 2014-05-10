<?php

class UserController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth', array('except' => array('getLogin', 'getCreated', 'getNotActivated')));
	}

	public function getProfile()
	{
		return View::make('profile');
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

	public function getLogin()
        {
		$code = Input::get( 'code' );
		$googleService = OAuth::consumer( 'Google' );

		if ( !empty( $code ) ) {
			$token = $googleService->requestAccessToken( $code );
			$result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );

			$user = User::where('email', '=', $result['email'])->first();

			if($user && $user->activated)
			{
				Auth::login($user);
				return Redirect::to('/');
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
				$user->save();
				return Redirect::action('UserController@getCreated');
			}
		}
		else {
			$url = $googleService->getAuthorizationUri();
			return Redirect::to((string)$url);
		}
	}
}