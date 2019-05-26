@extends('layouts.main')
@section('title', 'Welcome')

@section('content')


 <div class="header_wrap">
  <div class="info">
     <div class="container">
         <div class="row">
            <div class="col-md-7">
                 <div class="header_info">
                    <div class="descrip">
                        
                        <h1 style="color:#ece705; font-weight: bold;     margin-top: 0;">WELCOME</h1>
                         <p>
                           Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt.
                           </p><br>
                           <div>
                           <p>
                            <a href="#" class="btn btn-danger" >About US</a>
                             <a href="#" class="btn btn-danger" >Contact US</a>
                            </p>

                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>
 
        <section class="wp-separator">
            <article class="section">
                <div class="container">
                    <div class="row text-center">
                        <p class="h1">ACTIVITIES & EVENTS</p>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum nam numquam voluptates cumque </p>
                    </div>
                </div>
            </article>
        </section>

<div class="container-fluid">
        <section class="section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                <div class="well well-sm wl" style="background-color: ;">
                    
                    <div class="btn-group">
                        <a href="#" id="list" class="btn btn-default btn-sm"><span class="fa fa-th-list">
                        </span> List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                            class="fa fa-th"></span> Grid</a>
                    </div>
                </div>
  
      <div id="grid_post" class="row">

    @foreach ($posts as $post)
 
         <div class="item post-item col-xs-5 col-lg-5" >
            <div class="card mb-3">
              <h4 class="card-header text-white bg-primary" style="margin-top: -10px;">{{str_limit ($post->title,20)}}</h4>
              <img style="height: 200px; width: 100%; display: block;" src="{{asset('images/'.$post->image)}}" alt="Card image">
              <div class="card-body">
                <p class="card-text" style="font-size: 12px;">{!! str_limit($post->content,100)!!}</p>
               <button type="button" class="btn btn-primary card-link text-white" style="margin: 0 auto;"><a href="http://laravelforum.test/posts/{{$post->slug}}" class="text-white">Read more</a></button>
              </div>
              <div class="card-footer text-muted">
                {{date ('j F Y, h:ia', strtotime($post->created_at))}}
              </div>
            </div>
        </div>
    @endforeach
  </div><!-- end grid -->
</div>

  @include('includes.sidebar')

    <!-- end row -->
</div>
        </section>
        <!-- FOOTER --> 
         <div class="text-center d-flex justify-content-center">
                <ul class="pagination">
                {!!$posts->links()!!}
              </ul>
            </div>
         </div>
        <!-- END FOOTER --> 
</div><!-- end con fluid -->
@endsection