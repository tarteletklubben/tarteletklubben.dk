@extends('layouts.menu')

@section('content')

	<h1><a href="{{action('StoryController@getIndex')}}">Nyheder</a></h1>
	@include('templates.story-list', array('stories' => $stories, 'paginate' => false))

@stop
