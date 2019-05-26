@extends('layouts.main')
@section('title',"$tags2->name_tags Tag")

@section('content')

<div class="container">
  <h1 class="text-center">Tags by Posts</h1>
  	<br>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Posts List</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="text-center"><h3>{{$tags2->name_tags}} Tags  <small> ( {{$tags2->posts()->count()}} Posts )</small></h3></div>
          <hr>
      <div class="row">
        <div class="col-md-9">
          @foreach($tags2->posts as $post)
          <div class="post-item">
            <div class="post-iner">
              <div class="post-head clearfix">
                <div class="col-md-4">
                  <a href=""><img src="{{asset('images/'.$post->image)}}" style="width: 100%; height: 200px;"></a>
                </div>
                <div class="col-md-8">
                  <div class="detail">
                    <h2 class="handle"><a href="{{route('postShow',$post->slug)}}">{{$post->title}}</a></h2>
                  </div>
                  <div class="post-meta">
                    <div>
                      <span>{{date('j F Y', strtotime($post->created_at))}}</span>
                      <span>| by</span>
                      <span>Admin</span>
                    </div>
                  </div>
                  <span class="share">
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-instagram"></i>
                  </span>

                  
                    <span class="label label-success">{{$tags2->name}}</span>
                  

                  <div class="content" style="margin-top: 12px;">
                    {!!str_limit($post->content,150)!!}
                  </div>

                </div>
              </div>          
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div> 

  </div>
</div>
	<br><br>

@endsection

<style type="text/css">
	li{
		padding-left: 40px;
		padding-right: 40px;
	}
</style>