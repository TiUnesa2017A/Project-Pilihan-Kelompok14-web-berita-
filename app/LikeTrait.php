<?php 

namespace App;

trait LikeTrait

{
	public function likes()
	{
		return $this->morphMany('App\Like', 'likeable');
	}

	public function YouLikeIt()
	{
		$like = New Like();
		$like->user_id = auth()->user()->id;

		$this->likes()->save($like);
		return $like;
	}

	public function YouLiked()
	{
		return !!$this->likes()->where('user_id', auth()->id())->count();
	}

	public function YouUnlike()
	{
		$this->likes()->where('user_id', auth()->id())->delete();
	}
}