<table class="table table-bordered">
	<tr>
		<th colspan="2"><a href="{{action('StoryController@getStory', $story->id)}}">{{$story->headline}}</a></th>
	</tr>
	<tr>
		<td>Dato: {{$story->created_at}} @if($story->updated_at != $story->created_at)<br/>Updateret: {{$story->updated_at}}@endif
		<td>{{$story->content}}</td>
	</tr>
<table>
