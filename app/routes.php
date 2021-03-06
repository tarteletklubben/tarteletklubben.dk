<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$stories = Story::latest('created_at')->take(5)->get();
	return View::make('index')->with('stories', $stories);
});


Route::controller('/user', 'UserController');
Route::controller('/news', 'StoryController');
