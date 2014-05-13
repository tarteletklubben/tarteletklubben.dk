@extends('layouts.menu')

@section('content')

	<h1>Brugere</h1>
	<table class="table table-bordered">
		<tr>
			<th>Navn</th><th>Mail</th><th>Billede</th>
		</tr>
		@foreach($users as $user)
			<tr>
				<td>{{$user->name}} {{$user->surname}}</td>
				<td>{{$user->email}}</td>
				<td width="20%"><img src="{{$user->profile_picture}}" class="img-responsive img-thumbnail"></td>
			</tr>
		@endforeach
	<table>

	@if($users_not_activated->count() > 0)
		<h1>Ikke aktiveret</h1>
		<table class="table table-bordered">
			<tr>
				<th>Navn</th><th>Mail</th><th>Billede</th>
			</tr>
			@foreach($users_not_activated as $user)
				<tr>
					<td>{{$user->name}} {{$user->surname}}</td>
					<td>{{$user->email}}</td>
					<td width="20%"><img src="{{$user->profile_picture}}" class="img-responsive img-thumbnail"></td>
				</tr>
			@endforeach
		<table>
	@endif
@stop
