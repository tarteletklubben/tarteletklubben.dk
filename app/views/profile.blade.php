@extends('layouts.menu')

@section('content')

	<h1>Profile</h1>
	<div class="row">
		<div class="col-xs-9">
			<table class="table">
				<tr>
					<th>Navn</th>
					<td>{{$user->name}} {{$user->surname}}</td>
				<tr>
					<tr>
						<th>Mail</th>
						<td>@if(Auth::check()){{$user->email}}@else Skjult @endif</td>
					<tr>
			</table>
		</div>

		@if($user->profile_picture)
			<div class="col-xs-3">
				<img src="{{$user->profile_picture}}" class="img-responsive img-thumbnail">
			</div>
		@endif
	</div>

	@if($user->stories->count() > 0)
		<div class="row">
			@include('templates.story-list', array('stories' => $user->stories, 'paginate' => false))
		</div>
	@endif

	@if(!$user->activated && Auth::check())
		<div class="row">
			<div class="col-xs-3 col-xs-offset-9">
				<a href="{{action('UserController@getActivate', $user->id)}}">Aktiver!</a>
			</div>
		</div>
	@endif

@stop
