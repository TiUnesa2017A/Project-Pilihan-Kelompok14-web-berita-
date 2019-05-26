<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\Like;
use App\Subscriber;
use Storage;
use Auth;
use Gate;

class PostController extends Controller
{

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('admin')->except('index', 'show');
    //     $this->middleware('auth')->except('index', 'show');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }

        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.postTT.create', compact('posts', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $posts = new Post;
        $posts->title = $request->title;
        $posts->slug = str_slug($posts->title);
        $posts->content = $request->content;
        $posts->category_id = $request->category_id;
 
        if($request->hasFIle('image')){
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $fileName);
            $posts->image = $fileName;
        }
        

        $posts->save();
        $posts->tags()->sync($request->tags);

        $subscribers = Subscriber::all();
        foreach($subscribers as $subscriber)
        {
            Notification::route('mail',$subscriber->email)
            ->notify(new NewPostNotification($posts));
        }
        

        return back()->withInfo('berhasil membuat post baru'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPostttAdmin()
    {
        if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }

        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::all();

        return view ('admin.postTT.show', compact('posts', 'categories', 'tags'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $tags = Tag::orderBy('id','desc')->paginate(3);
        $categories = Category::orderBy('id','desc')->paginate(3);

        $posts = Post::where('slug','=', $slug)->first();
        return view ('blog.show', compact('posts', 'categories', 'tags'));
    }

    // public function postLike(Request $request){
    //     $post_id = $request['postId'];
    //     $is_like = $request['isLike'] === 'true';
    //     $update = false;
    //     $post = Post::find($id);

    //     if(!$post) {
    //         return null;
    //     }
    //     $user = Auth::user();
    //     $like = $user->likes()->where('post_id', $post_id)->first();
    //     if($like) {
    //         $already_like = $like->like;
    //         $update = true;
    //         if($already_like = $is_like) {
    //             $like->delete();
    //             return null;
    //         }
    //     }
    //     else{
    //         $like = new Like();
    //     }
    //     $like->like = $is_like;
    //     $like->user_id = $user->id;
    //     $like->post_id = $post->id;

    //     if($update){
    //         $like->update();
    //     }
    //     else{
    //         $like->save();
    //     }
    //     return null;
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }
        
        $categories = Category::all();
        $posts = Post::find($id);
        $tags = Tag::all();
        return view('admin.postTT.edit', compact('posts', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $posts = Post::find($id);
        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->category_id = $request->category_id;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $fileName);

            $oldFilename = $posts->image;
            \Storage::delete($oldFilename);
            $posts->image = $fileName;
        }

        $posts->save();
        $posts->tags()->sync($request->tags);
        return back()->withInfo('berhasil mengedit post'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        Storage::delete($posts->image);
        $posts->tags()->detach();

        $posts->delete();

        return back()->withInfo('Post telah berhasil di hapus');
    }

}
