<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
   @yield('style')
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
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
        <main class="py-4">
          <div class="container">
              <div class="row">
                  
                @if(auth::check())
                    <div class="col col-lg-3">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="list-group-item"><a href="{{route('settings')}}">Settings</a></li>
                            <li class="list-group-item"><a href="{{route('posts')}}">All Posts</a></li>
                            <li class="list-group-item"><a href="{{route('post.create')}}">Add Post</a></li>
                            <li class="list-group-item"><a href="{{route('post.trashed')}}">Trashed Post</a></li>
                            <li class="list-group-item"><a href="{{route('categories')}}">Categories</a></li>
                            <li class="list-group-item"><a href="{{route('category.create')}}">Add Category</a></li>
                            <li class="list-group-item"><a href="{{route('tags')}}">All Tag</a></li>
                            <li class="list-group-item"><a href="{{route('tag.create')}}">Add Tag</a></li>
                            <li class="list-group-item"><a href="{{route('users')}}">Users</a></li>
                            <li class="list-group-item"><a href="{{route('user.create')}}">Add User</a></li>
                            <li class="list-group-item"><a href="{{route('user.profile')}}">Profile</a></li>
                        </ul>
                    </div>
                @endif
                  
                  <div class="col col-lg-9">
                    @yield('content')
                  </div>
              </div>
          </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
            @if(Session::has('success'))
            toastr.success("{{Session::get('success')}}")
            @endif
            @if(Session::has('info'))
            toastr.info("{{Session::get('info')}}")
            @endif
        </script>
    @yield('script')
</body>
</html>
