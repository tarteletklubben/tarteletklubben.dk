@extends('layouts.menu')

@section('content')
	@if(isset($story))
		{{Form::model($story, array('action' => array('StoryController@putAddStory', $story->id), 'method' => 'put', 'role' => 'form'))}}
	@else
		{{Form::open(array('action' => array('StoryController@postAddStory'), 'role' => 'form'))}}
	@endif

	<div class="form-group">
		{{Form::label('headline', 'Headline', array('for' => 'headline'))}}
		{{Form::text('headline', $value = null, array('class' => 'form-control', 'id' => 'headline'))}}
	</div>

	<div class="form-group">
		{{Form::label('content', 'Content', array('for' => 'content'))}}
		{{Form::textarea('content', $value = null, array('class' => 'form-control', 'id' => 'content'))}}
	</div>

	{{Form::submit(isset($story) ? 'Opdater' : 'Tilføj');}}

	{{Form::close()}}

@stop
