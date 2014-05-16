@extends('layouts.menu')

@section('content')

	<h1>Seneste nyt</h1><a href="{{action('StoryController@getIndex')}}">mere</a>
	@include('templates.story-list', array('stories' => $stories, 'paginate' => false))

@stop
