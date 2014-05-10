@extends('layouts.menu')

@section('content')

	<h1>Profile</h1>
	<table class="table">
		<tr>
			<th>Navn</th>
			<td>{{Auth::user()->name}} {{Auth::user()->surname}}</td>
		<tr>
		<tr>
			<th>EMail</th>
			<td>{{Auth::user()->email}}</td>
		<tr>
	</table>

@stop
