@extends('layouts.menu')

@section('content')

	<h1>Nyheder</h1>
	@foreach($stories as $story)
		<div class="table">
			<table class="table table-bordered">
				<tr>
					<th colspan="2">{{$story->headline}}</th>
				</tr>
				<tr>
					<td>Dato: {{$story->created_at}} @if($story->updated_at != $story->created_at)<br/>Updateret: {{$story->updated_at}}@endif</td>
					<td>{{$story->content}}</td>
				</tr>
			<table>
		</div>
	@endforeach

@stop
