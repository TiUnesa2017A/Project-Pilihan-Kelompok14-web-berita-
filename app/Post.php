<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	use LikeTrait;

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function tags()
	{
		return $this->belongsToMany('App\Tag');
	}

	public function comments()
	{
		return $this->morphMany('App\Comment','commentable');
	}

}
