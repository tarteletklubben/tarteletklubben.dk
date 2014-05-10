@extends('layouts.menu')

@section('content')

	<h1>Nyheder</h1>
	@foreach($stories as $story)
		<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th colspan="2">{{$story->headline}}</th>
				</tr>
				<tr>
					<td>Dato: {{$story->date}}</td>
					<td>{{$story->content}}</td>
				</tr>
			<table>
		</div>
	@endforeach

@stop
