@extends('layouts.master')

@section('menu')

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Tarteletklubben</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::check())
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Navigation<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="{{action('UserController@getList')}}">Brugere</a></li>
							<li class="divider"></li>
							<li><a href="{{action('StoryController@getIndex')}}">Nyheder</a></li>
							<li><a href="{{action('StoryController@getAddStory')}}">Tilføj nyhed</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} {{Auth::user()->surname}}<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="{{action('UserController@getProfile')}}">Profil</a></li>
							<li class="divider"></li>
							<li><a href="{{action('UserController@getLogout')}}">Log ud</a></li>
						</ul>
					</li>
				@else
					<li><a class="btn btn-link" href="{{action('UserController@getLogin')}}">Log ind via Google</a></li>
				@endif
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

@stop
