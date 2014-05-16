@extends('layouts.menu')

@section('content')

	<h1>Brugere</h1>
	<table class="table table-bordered">
		<tr>
			<th>Navn</th><th>Kasketter</th><th>Billede</th>
		</tr>
		@foreach($users as $user)
			<tr>
				<td><a href="{{action('UserController@getProfile', $user->id)}}">{{$user->name}} {{$user->surname}}</a></td>
				<td>
					@foreach($user->roles as $role)
						{{$role->name}}<br/>
					@endforeach
				</td>
				<td width="20%"><a href="{{action('UserController@getProfile', $user->id)}}"><img src="{{$user->profile_picture}}" class="img-responsive img-thumbnail"></a></td>
			</tr>
		@endforeach
	<table>

	@if($users_not_activated->count() > 0)
		<h1>Ikke aktiveret</h1>
		<table class="table table-bordered">
			<tr>
				<th>Navn</th><th>Billede</th>
			</tr>
			@foreach($users_not_activated as $user)
				<tr>
					<td><a href="{{action('UserController@getProfile', $user->id)}}">{{$user->name}} {{$user->surname}}</a></td>
					<td width="20%"><a href="{{action('UserController@getProfile', $user->id)}}"><img src="{{$user->profile_picture}}" class="img-responsive img-thumbnail"></a></td>
				</tr>
			@endforeach
		<table>
	@endif
@stop
