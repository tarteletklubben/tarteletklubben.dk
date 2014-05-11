<?php

class StoryController extends \BaseController {

	protected static $restful = true;

	public function getIndex()
	{
		$stories = Story::orderBy('created_at', 'desc')->paginate(10);
		return View::make('story-listing')->with('stories', $stories);
	}

	public function getStory($id)
	{
		$story = Story::find($id);
		return View::make('story')->with('story', $story);
	}

}
