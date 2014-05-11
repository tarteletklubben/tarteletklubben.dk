@extends('layouts.menu')

@section('content')

	@include('templates.story', array('story' => $story))

@stop
