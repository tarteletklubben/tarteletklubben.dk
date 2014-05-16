<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStoryUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('story_user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('story_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->enum('user', array('author', 'editor'));

			$table->foreign('story_id')->references('id')->on('stories');
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('story_user');
	}

}
