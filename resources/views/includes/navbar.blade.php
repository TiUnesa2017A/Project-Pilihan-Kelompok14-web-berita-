
<nav class="navbar navbar-expand-xl navbar-dark" style="border-bottom: 10px double #292929; padding: 15px; background: #f7f7f7;">
            <div class="container-fluid">
                 @if (Auth::guest())
                  <a class="navbar-brand text-dark" href="{{route('welcome')}}">Netijen.com</a>
                  @else
                  <a class="navbar-brand text-dark" href="{{route('home')}}">Netijen.com</a>
                  @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse nav_main" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-left">
                      <form action="{{route('search')}}" class="form-inline my-4 my-lg-3" method="post" style="padding-left: 90">
                      <input class="typeahead form-control mr-sm-2" type="text" placeholder="Search" name="search">
                      {{csrf_field()}}
                      <button class="btn btn-outline-info my-2 my-sm-0" style="color: black;" type="submit">Search</button>
                    </form>
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item text-dark">
                                <a class="nav-link text-dark" style="font-weight: 600;" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item text-dark">
                                    <a class="nav-link text-dark" style="font-weight: 600;" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                           <!-- Notification -->
                           <notification :userid="{{auth()->id()}}" :unreads="{{auth()->user()->unreadNotifications}}"></notification>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: black;">
                                    {{ Auth::user()->name }} 
                                    <span class="fa fa-chevron-down"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile', Auth::user()->name) }}" style="border-bottom: 1px solid grey;">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item"  style="border-top: 1px solid grey;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


<style type="text/css">
    
    .subnav li:hover a{
        font-style: italic;
        color: black;
    }
</style>
