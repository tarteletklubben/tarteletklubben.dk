@extends('layouts.menu')

@section('content')

	<h1>Profile</h1>
	@if(Auth::user()->profile_picture)
		<div class="row">

			<div class="col-xs-9">
				<table class="table">
					<tr>
						<th>Navn</th>
						<td>{{Auth::user()->name}} {{Auth::user()->surname}}</td>
					<tr>
					<tr>
						<th>Mail</th>
						<td>{{Auth::user()->email}}</td>
					<tr>
			</table>
			</div>

			<div class="col-xs-3">
				<img src="{{Auth::user()->profile_picture}}" class="img-responsive img-thumbnail">
			</div>
		</div>
	@endif

@stop
