<table class="table table-bordered">
	<tr>
		<th colspan="2">
			<a href="{{action('StoryController@getStory', $story->id)}}">{{$story->headline}}</a>
		</th>
	</tr>
	<tr>
		<td class="col-xs-3">Dato: {{$story->created_at}} @if($story->updated_at != $story->created_at)<br/>Opdateret: {{$story->updated_at}}@endif
		<td>{{$story->content}}</td>
	</tr>
	@if(Auth::check())
		<tr>
			<td colspan="2" align="right">
				<a href="{{action('StoryController@getAddStory', array('id' => $story->id))}}"><small>Rediger</small></a>
			</td>
		</tr>
	@endif

<table>
