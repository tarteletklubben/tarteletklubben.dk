@extends('layouts.menu')

@section('content')

	<h1>Profil</h1>
	<div class="row">
		<div class="col-xs-9">
			<table class="table table-hover">
				<tr>
					<th>Navn</th>
					<td>{{$user->name}} {{$user->surname}}</td>
				</tr>
				<tr>
					<th>Mail</th>
					<td>@if(Auth::check()){{$user->email}}@else Skjult @endif</td>
				</tr>
				<tr>
					<th>Kasketter</th>
					<td>
						@foreach($user->roles as $role)
							{{$role->name}}<br/>
						@endforeach
					</td>
				</tr>
				<tr>
					<th>Meldt ind</th>
					<td>{{$user->created_at}}</td>
				</tr>
			</table>
		</div>

		@if($user->profile_picture)
			<div class="col-xs-3">
				<img src="{{$user->profile_picture}}" class="img-responsive img-thumbnail">
			</div>
		@endif
	</div>

	@if($user->stories->count() > 0)
		<div class="row top-space">
			<h1>Bidrag</h1>
			@include('templates.story-list', array('stories' => $user->stories, 'paginate' => false))
		</div>
	@endif

	@if(!$user->activated && Auth::check() && Auth::user()->isAdmin())
		<div class="row top-space">
			<div class="col-xs-3 col-xs-offset-9">
				<a href="{{action('UserController@getActivate', $user->id)}}" class="btn btn-success">Aktiver!</a>
			</div>
		</div>
	@endif

@stop
