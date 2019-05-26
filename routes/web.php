<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// auth route
Auth::routes();

Route::post('/subscriber','SubscriberController@store')->name('subscriberStore');

// main interface
Route::get('/', function () {
    $tags = App\Tag::orderBy('id','desc')->paginate(3);
	$categories = App\Category::orderBy('id','desc')->paginate(3);
	$posts = App\Post::paginate(6);
	return view('welcome', compact('tags', 'categories', 'posts'));
})->name('welcome');

Route::get('/home', function(){
	if(!Gate::allows('isUser')){
            abort(404,"Sorry, You can do this actions");
        }
    if(!Gate::denies('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }

	$tags = App\Tag::orderBy('id','desc')->paginate(3);
	$categories = App\Category::orderBy('id','desc')->paginate(3);
	$posts = App\Post::paginate(6);
	return view('home', compact('tags', 'categories', 'posts'));
})->name('home');

Route::get('/admin/manage', function(){
	if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }	
	$tags = App\Tag::all();
	$categories = App\Category::all();
	$posts = App\Post::all();
	$beasiswas = App\beasiswa::all();
	$kompetisies = App\Kompetisi::all();
	$materi_downloads = App\materi_download::all();
	$threads = App\Thread::all();
	$users = App\User::all();
	return view('admin.maindashboard', compact('tags', 'categories', 'posts', 'beasiswas', 'kompetisies', 'materi_downloads', 'threads', 'users'));
})->name('manageDashboard');

// category &tags
Route::get('category/show/{id}', 'CategoryController@show')->name('showCategory');
Route::get('category/index', 'CategoryController@index')->name('totalCategoryIndex');
Route::get('tags/show/{id}', 'TagController@show')->name('showTag');
Route::get('tags/index', 'TagController@index')->name('totalTagIndex');


// main menu
Route::get('posts/{slug}', 'PostController@show')->name('postShow');
Route::post('posts/like', 'LikeController@Liked')->name('postLike');

// comment
Route::post('comment/create/{post}','CommentController@newComment')->name('newComment.store');

// search
Route::post('search','SearchController@search')->name('search');


// user profile
Route::get('/user/{user}','ProfileController@index')->name('profile');
Route::get('/user/{user}/edit','ProfileController@edit')->name('editProfile');
Route::post('/user/{user}/edit','ProfileController@update')->name('profileUpdate');

//contactUs
Route::get('/contactus','CantactUsController@index')->name('contactUsView');
Route::get('/faq-Concern', function(){
	return view('additional.faq');
})->name('faqView');
Route::get('/about-us', function(){
	return view('additional.aboutus');
})->name('aboutView');


// SuperAdmin
 // post
 Route::resource('/admin/manage/posts', 'PostController')->only([
    'create', 'store', 'update', 'destroy', 'edit'
 ]);
 Route::get('admin/manage/posts/show', 'PostController@showPostttAdmin')->name('showPostttAdmin');
 // end post
 // category
 Route::resource('/admin/manage/category', 'CategoryController')->only([
    'create', 'store', 'update', 'destroy', 'edit'
 ]);
 Route::get('admin/manage/category/show', 'CategoryController@showCatAdmin')->name('showCatAdmin');
 // end category
 // tags
 Route::resource('/admin/manage/tags', 'TagController')->only([
    'create', 'store', 'update', 'destroy', 'edit'
 ]);
 Route::get('admin/manage/tags/show', 'TagController@showTagAdmin')->name('showTagAdmin');
 // end tags
 //user management
 Route::get('admin/manage/users/show', 'ProfileController@userManagement')->name('userShowAll');
 Route::resource('/admin/manage/users', 'ProfileController')->only([
    'destroy', 'edit'
 ]);
 Route::get('admin/manage/subscriber/show','SubscriberController@index')->name('subscriberIndex');
 Route::delete('admin/manage/subscriber/show/{subscriber}','SubscriberController@destroy')->name('subscriberDestroy');
// End Super Admin