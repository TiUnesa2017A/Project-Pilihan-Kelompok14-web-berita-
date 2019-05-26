<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Post;

class LikeController extends Controller
{
    public function Liked()
    {
    	$postId = Input::get('postId');
    	$posts = Post::find($postId);

    	if(!$posts->YouLiked())
    	{
    		$posts->YouLikeIt();
    		return response()->json(['status' => 'success', 'message' => 'liked']);
    	}
    	else
    	{
    		$posts->YouUnlike();
    		return response()->json(['status' => 'success', 'message' => 'unliked']);
    	}
    }
}
