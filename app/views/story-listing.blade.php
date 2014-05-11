@extends('layouts.menu')

@section('content')

	<h1>Nyheder</h1>
	@include('templates.story-list', array('stories' => $stories, 'paginate' => true))

@stop
