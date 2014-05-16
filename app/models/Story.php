<?php


class Story extends Eloquent {

	public function author()
	{
		return $this->users()->withPivot('user')->where('user', '=', 'author');
	}

	public function editors()
	{
		return $this->users()->withPivot('user')->where('user', '=', 'editor');
	}

	public function users()
	{
		return $this->belongsToMany('User');
	}

}
