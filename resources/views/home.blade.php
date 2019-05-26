@extends('layouts.main')
@section('title', 'Welcome')

@push('css')
    <link href="{{ asset('css/HomeCss/jquery.smartmenus.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/HomeCss/jquery.simpleLens.css') }}" rel="stylesheet">
    <link href="{{ asset('css/HomeCss/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/HomeCss/nouislider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/HomeCss/sequence-theme.modern-slide-in.css') }}" rel="stylesheet">
    <link href="{{ asset('css/HomeCss/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/HomeCss/lite-blue-theme.css') }}" rel="stylesheet">
@endpush

@section('content')
@cannot('isAdmin')
 {{-- <div class="header_wrap">
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
</div> --}}

<!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
        <section class="wp-separator" style="visibility: hidden;">
            <article class="section">
                <div class="container-fluid">
                </div>
            </article>
        </section>

<div class="container-fluid" >
        <section class="section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                <div class="well well-sm wl" style="background-color: ;">
                    
                    <div class="btn-group">
                        <!-- <a href="#" id="list" class="btn btn-default btn-sm"><span class="fa fa-th-list">
                        </span> List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                            class="fa fa-th"></span> Grid</a> -->
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
               <div class="pull-right">
                  <span class="btn btn-default btn-xs" id="{{$post->id}}-count">{{$post->likes()->count()}} Likes</span>
               </div>
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
        <section>
        <!-- FOOTER --> 
         <div class="text-center d-flex justify-content-center">
                <ul class="pagination">
                {!!$posts->links()!!}
              </ul>
            </div>
         </div>
        <!-- END FOOTER -->
        </section><hr style="border: 0.3px solid black;">

<!-- Testimonial -->
  <section id="aa-testimonial">  
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-testimonial-area">
            <ul class="aa-testimonial-slider">
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="{{asset('images/ImgPartner/fm.png')}}" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Fahri Muhammad</p>
                    <span>Laravel Backend Developer</span>
                    <a href="#">Informatics.id</a>
                  </div>
                </div>
              </li>
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="{{asset('images/ImgPartner/cupu.jpeg')}}" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Husni Mubarok</p>
                    <span>Frontend Developer</span>
                    <a href="#">Informatics.id</a>
                  </div>
                </div>
              </li>
               <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="img/testimonial-img-3.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Alfin Falah Sugiharto</p>
                    <span>Frontend Developer</span>
                    <a href="#">Informatics.id</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Testimonial -->

  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
              <li><a href="#"><img src="{{ asset('images/ImgPartner/laravel.png') }}" alt="laravel img"></a></li>
              <li><a href="#"><img src="{{ asset('images/ImgPartner/vueJS.png') }}" alt="vue js img"></a></li>
              <li><a href="#"><img src="{{ asset('images/ImgPartner/bootstrap.png') }}" alt="bootstrap img"></a></li>
              <li><a href="#"><img src="{{ asset('images/ImgPartner/html5.png') }}" alt="html5 img"></a></li>
              <li><a href="#"><img src="{{ asset('images/ImgPartner/css3.png') }}" alt="css3 img"></a></li>
              <li><a href="#"><img src="{{ asset('images/ImgPartner/jquery.png') }}" alt="jquery img"></a></li>
              <li><a href="#"><img src="{{ asset('images/ImgPartner/joomla.png') }}" alt="joomla img"></a></li>
              <li><a href="#"><img src="{{ asset('images/ImgPartner/ajax.png') }}" alt="ajax img"></a></li>
              <li><a href="#"><img src="{{ asset('images/ImgPartner/laravel.png') }}" alt="laravel img"></a></li>
              <li><a href="#"><img src="{{ asset('images/ImgPartner/vueJS.png') }}" alt="vue js img"></a></li>
              <li><a href="#"><img src="{{ asset('images/ImgPartner/bootstrap.png') }}" alt="bootstrap img"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->
</div><!-- end con fluid --><br><br>

@endcannot
@endsection

@section('js')
  <script src="{{ asset('js/HomeJs/jquery.smartmenus.js') }}"></script>
  <script src="{{ asset('js/HomeJs/jquery.smartmenus.bootstrap.js') }}"></script>
  <script src="{{ asset('js/HomeJs/sequence.js') }}"></script>
  <script src="{{ asset('js/HomeJs/sequence-theme.modern-slide-in.js') }}"></script>
  <script src="{{ asset('js/HomeJs/jquery.simpleGallery.js') }}"></script>
  <script src="{{ asset('js/HomeJs/jquery.simpleLens.js') }}"></script>
  <script src="{{ asset('js/HomeJs/slick.js') }}"></script>
  <script src="{{ asset('js/HomeJs/nouislider.js') }}"></script>
  <script src="{{ asset('js/HomeJs/custom.js') }}"></script>
@endsection