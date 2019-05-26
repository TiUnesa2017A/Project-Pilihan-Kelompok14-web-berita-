<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Informatics') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!--     <link rel="stylesheet" type="text/css" href="{{ asset('css/LogSign.css')}}" -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet">
    <link href="{{ asset('css/newlogsign.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style type="text/css">
    
      .subnav li:hover a{
          font-style: italic;
          color: black;
      }
    </style>

</head>
<body>
   
<div >
        
    <nav class="navbar navbar-expand-lg navbar-light " style="border-bottom: 0.7px solid grey; margin-top: -1%;">
      <a class="navbar-brand disabled" href="{{route('welcome')}}">informatics.id</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse nav_top" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('beasiswa')}}">Beasiswa <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{route('kompetisi')}}">Kompetisi <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link " href="{{route('materiIndex')}}">Materi</a>
          </li>
           <li class="nav-item active">
            <a class="nav-link" href="{{route('forum')}}">Forum</a>
          </li>
           <li class="nav-item active">
            <a class="nav-link" href="#">Project</a>
          </li>
        </ul>
        <form action="{{route('search')}}" class="form-inline my-4 my-lg-3" method="post">
          <input class="typeahead form-control mr-sm-2" type="text" placeholder="Search" name="search">
          {{csrf_field()}}
          <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>


        <!-- <div class="nav_top">
            <ul>
              <li><a href="{{route('beasiswa')}}" class="" style=" font-size: 15px;">Beasiswa</a></li>
                <li><a href="" class="" style="font-size: 15px;">Kompetisi</a></li>
                <li><a href="" class="" style=" font-size: 15px;">Materi</a></li>
                <li><a href="" class="" style=" font-size: 15px;">Diskusi</a></li>
                <li><a href="" class="" style=" font-size: 15px;">Project</a></li>
                    <form action="{{route('search')}}" class="form-inline my-2 my-lg-0 pull-right" method="post" style="float: left;">
                        {{csrf_field()}}
                        <input class="form-control mr-md-2" type="text" placeholder="Search" name="search">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                    </form>
            </ul>

        </div> -->

        <main class="container-fluid">
            @yield('content')
        </main>

</div>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ asset('js/logsign.js') }}"></script>
    @yield('js')
</body>
</html>
