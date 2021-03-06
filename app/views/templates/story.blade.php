<table class="table table-bordered">
	<tr>
		<th colspan="2">
			<a href="{{action('StoryController@getStory', $story->id)}}">{{$story->headline}}</a>
		</th>
	</tr>
	<tr>
		<td class="col-xs-3">
			Dato: {{$story->created_at}}
			@if($story->updated_at != $story->created_at)<br/>Opdateret: {{$story->updated_at}}@endif
			<br/><br/>Skrevet af:<br/>
			@foreach($story->author as $author)
				<a href="{{action('UserController@getProfile', $author->id)}}">{{$author->name}} {{$author->surname}}</a><br/>
			@endforeach
			@if($story->editors->count() > 0)
				<br/>Rettet af:<br/>
				@foreach($story->editors as $editor)
					<a href="{{action('UserController@getProfile', $editor->id)}}">{{$editor->name}} {{$editor->surname}}</a><br/>
				@endforeach
			@endif
		</td>
		<td>{{$story->content}}</td>
	</tr>
	@if(Auth::check() && Auth::user()->isAdmin())
		<tr>
			<td colspan="2" align="right">
				{{Form::open(array('action' => array('StoryController@deleteStory', $story->id), 'method' => 'delete'))}}
					<a href="{{action('StoryController@getAddStory', array('id' => $story->id))}}" class="btn btn-warning">Rediger</a>
					{{Form::submit('Slet', $attributes = array('class' => 'btn btn-danger'))}}
				{{Form::close()}}
			</td>
		</tr>
	@endif

<table>
