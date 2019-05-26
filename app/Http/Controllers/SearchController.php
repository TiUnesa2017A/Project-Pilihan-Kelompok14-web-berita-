<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$fm = $request->input('search');
    	
    	$posts = Post::where('title','LIKE','%' .$fm. '%')->get();
    	return view('search.result',['posts' => $posts] );
    }


    public function searchThread(Request $request)
    {
        $thread = $request->input('search');

        $threads = Thread::where('title', 'LIKE', '%' .$thread. '%')->get();

        return back()->withThreads($threads);
    }
}
