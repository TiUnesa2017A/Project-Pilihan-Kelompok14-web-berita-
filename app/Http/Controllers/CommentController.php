<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;


class CommentController extends Controller
{
    public function newComment(Request $request, Post $post)
    {
    	$comment = new Comment;
    	$comment->comment = $request->comment;
    	$comment->user_id = auth()->user()->id;

    	$post->comments()->save($comment);
        
    	return back()->withInfo('Komentar berhasil di buat!!!');
    }

}
