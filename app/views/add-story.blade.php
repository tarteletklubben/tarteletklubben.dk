@extends('layouts.menu')

@section('content')
	<div class="row">
		@if(isset($story))
			{{Form::model($story, array('action' => array('StoryController@putAddStory', $story->id), 'method' => 'put', 'role' => 'form'))}}
		@else
			{{Form::open(array('action' => array('StoryController@postAddStory'), 'role' => 'form'))}}
		@endif

		<div class="form-group">
			{{Form::label('headline', 'Overskrift', array('for' => 'headline'))}}
			{{Form::text('headline', $value = null, array('class' => 'form-control', 'id' => 'headline'))}}
		</div>

		<div class="form-group">
			{{Form::label('content', 'Indhold', array('for' => 'content'))}}
			{{Form::textarea('content', $value = null, array('class' => 'form-control', 'id' => 'content'))}}
		</div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-xs-offset-11">
			{{Form::submit(isset($story) ? 'Opdater' : 'Tilføj', $attributes = array('class' => 'btn btn-success'));}}
		</div>
	</div>

	{{Form::close()}}

@stop
