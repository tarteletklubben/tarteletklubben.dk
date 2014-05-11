@foreach($stories as $story)
	@include('templates.story', array('story' => $story))
@endforeach

@if($paginate)
	{{$stories->links()}}
@endif
