@foreach($stories as $story)
	@include('templates.story', array('story' => $story))
@endforeach

@if($paginate)
	<div align="center">{{$stories->links()}}</div>
@endif
