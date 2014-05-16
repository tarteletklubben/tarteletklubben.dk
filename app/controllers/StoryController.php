<?php

class StoryController extends \BaseController {

	protected static $restful = true;

	public function __construct()
	{
		$this->beforeFilter('auth', array('except' => array('getIndex', 'getStory')));
	}

	public function getIndex()
	{
		$stories = Story::orderBy('created_at', 'desc')->paginate(10);
		return View::make('story-listing')->with('stories', $stories);
	}

	public function getStory($id)
	{
		$story = Story::findOrFail($id);
		return View::make('story')->with('story', $story);
	}

	public function getAddStory($id = null)
	{
		if($id)
		{
			$story = Story::findOrFail($id);
			return View::make('add-story')->with('story', $story);
		}
		else
		{
			return View::make('add-story');
		}
	}

	public function postAddStory()
	{
		$story = new Story();

		$story->headline = Input::get('headline');
		$story->content = Input::get('content');
		$story->save();

		return Redirect::action('StoryController@getIndex');
	}

	public function putAddStory($id)
	{
		$story = Story::findOrFail($id);

		$story->headline = Input::get('headline');
		$story->content = Input::get('content');
		$story->save();

		return Redirect::action('StoryController@getStory', $id);
	}
}
