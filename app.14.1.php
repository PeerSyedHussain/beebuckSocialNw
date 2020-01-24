<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!--Bootstrap  css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app-new.css') }}" >

    <link  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel= "stylesheet">
    @yield('head')
    @notify_css

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <div class='container'>
            <a href='#' class="navbar-brand">
                Laravel
            </a>

            <button type='button'id ='top-nav' class="navbar-toggler" data-toggle='collapse' data-target='#collapse-target'>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-end" id='collapse-target'>
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">

                            <span class='nav-text'>{{ auth()->user()->f_name }}</span>
                            <button class="btn btn-empty">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class='container mt-5'>

        <div class='row px-3 align-items-center top-profile-nav'>
            <div class='user-main-profile mt-5' >
                <img src='data:image/jpeg;base64,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'/>
            </div>
            <div class='col-md-7 mt-5'>
                <nav class='navbar navbar-dark bg-light'>

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href='#'>Timeline</a>
                        </li>
                        <li class="nav-item">
                            <a href='#'>Friends</a>
                        </li>
                        <li class="nav-item">
                            <a href='#'>About</a>
                        </li>
                        <li class="nav-item">
                            <a href='#'>Notification</a>
                        </li>
                        <li class="nav-item">
                            <a href='#'>Chats</a>
                        </li>
                        <li class="nav-item">
                            <button class='btn btn-outline-primary'>
                                Accept
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class='btn btn-outline-danger'>
                                Deny
                            </button>

                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div id="sidebar">
            <div class="toggle-btn" onclick="togglesidebar()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul>
                <a href='#'><li>NewsFeed</li></a>
                <a href='#'><li>Notification</li></a>
                <a href='#'><li>Groups</li></a>
                <a href='#'><li>Chats</li></a>
                <a href='#'><li>Friends List</li></a>
                <a href='#'><li>About</li></a>
            </ul>
        </div>

        <div class="row">
            <!-- <div class='sidenav'>
            <nav class="navbar navbar-expand-md navbar-dark bg-primary">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#top">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#top">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#top">Pricing</a>
                </li>
            This menu is hidden in bigger devices with d-sm-none.
           The sidebar isn't proper for smaller screens imo, so this dropdown menu can keep all the useful sidebar itens exclusively for smaller screens
            Smaller devices menu END
            </ul>
        </div>
    </nav>
    </div> -->
            <nav class="col-md-2  d-md-block bg-light mt-4 sidebar">
                <div class="sidebar-sticky">
                    <h5 class='heading'>Basics</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                Newsfeed <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                Notification <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                Groups <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                Chats<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                Friend list<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                About<span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="py-4 col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="row justify-content-around">

                    <div class="col-md-8 col-lg-8 content-section">
                        @yield('content')
                    </div>

                    <div class="col-md-3 col-lg-3 dashboard-section">

                        <h5 class='heading'>Dashboard</h5>


                    <!-- <div class="card">
                                <div class="card-header">Dashboard</div>

                                <div class="card-body">
                                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
{{ session('status') }}
                            </div>
@endif

                        You are logged in!
                    </div>
                </div> -->

                    </div>

                </div>
                <div class="row my-4">
                        <div class="col-lg-8">
                            <div class="central-meta">
                                <div class="editing-interest">

                                    <div class="col-md-12 col-lg-12 content-section">
                                        <h5 class="f-title heading">
                                            <i class="fa fa-bell"></i>
                                            All notification
                                        </h5>
                                        <div class="notification-box">
                                            <ul>
                                                <li>
                                                    <div class="notification-profile mr-4">
                                                        <img src='data:image/jpeg;base64,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'/>
                                                    </div>
                                                    <div class="notifi-meta">
                                                        <p style="margin: 0;">sarah liked your post</p>
                                                        <span>10 mins ago</span>
                                                        <i class="del fa-fa-close"></i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="notification-profile mr-4">
                                                        <img src='https://images.pexels.com/photos/2921424/pexels-photo-2921424.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500'/>
                                                    </div>
                                                    <div class="notifi-meta">
                                                        <p style="margin: 0;">metalda liked your post</p>
                                                        <span>10 mins ago</span>
                                                        <i class="del fa-fa-close"></i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="notification-profile mr-4">
                                                        <img src='https://images.pexels.com/photos/2829373/pexels-photo-2829373.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'/>
                                                    </div>
                                                    <div class="notifi-meta">
                                                        <p style="margin: 0;">bob liked your post</p>
                                                        <span>10 mins ago</span>
                                                        <i class="del fa-fa-close"></i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="notification-profile mr-4">
                                                        <img src='https://images.pexels.com/photos/3366108/pexels-photo-3366108.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'/>
                                                    </div>
                                                    <div class="notifi-meta">
                                                        <p style="margin: 0;">nikita liked your post</p>
                                                        <span>10 mins ago</span>
                                                        <i class="del fa-fa-close"></i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="notification-profile mr-4">
                                                        <img src='https://i.pinimg.com/736x/c5/9d/91/c59d91a7c1af93b9fdb91a0e4f9fe156.jpg'/>
                                                    </div>
                                                    <div class="notifi-meta">
                                                        <p style="margin: 0;">antony liked your post</p>
                                                        <span>10 mins ago</span>
                                                        <i class="del fa-fa-close"></i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="notification-profile mr-4">
                                                        <img src='https://www.outfittrends.com/wp-content/uploads/2017/03/patchy-beard-for-young-boys.jpg'/>
                                                    </div>
                                                    <div class="notifi-meta">
                                                        <p style="margin: 0;">rudra liked your post</p>
                                                        <span>10 mins ago</span>
                                                        <i class="del fa-fa-close"></i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="notification-profile mr-4">
                                                        <img src='https://images.pexels.com/photos/2526910/pexels-photo-2526910.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'/>
                                                    </div>
                                                    <div class="notifi-meta">
                                                        <p style="margin: 0;">larence liked your post</p>
                                                        <span>10 mins ago</span>
                                                        <i class="del fa-fa-close"></i>
                                                    </div>

                                                </li>
                                            </ul>

{{--                                        @yield('content')--}}
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>
</div>
@notify_js
@notify_render
@yield('scripts')
<script>
    function togglesidebar() {
        // console.log('hi')
        document.getElementById("sidebar").classList.toggle('active');
    }
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<title></title>--}}
{{--<head>--}}
{{--    <link rel="stylesheet" href="{{asset('css/app-new.css')}}">--}}
{{--</head>--}}
{{--<body>--}}
{{--<div id="sidebar">--}}
{{--    <div class="toggle-btn" onclick="togglesidebar()">--}}
{{--        <span></span>--}}
{{--        <span></span>--}}
{{--        <span></span>--}}
{{--    </div>--}}
{{--    <ul>--}}
{{--        <li>Newsfeed</li>--}}
{{--        <li>Notification</li>--}}
{{--        <li>Groups</li>--}}
{{--        <li>chats</li>--}}
{{--        <li>friendslist</li>--}}
{{--        <li>about</li>--}}
{{--    </ul>--}}
{{--</div>--}}

{{--</body>--}}
{{--<script>--}}
{{--    function togglesidebar() {--}}
{{--        // console.log('hi')--}}
{{--    document.getElementById("sidebar").classList.toggle('active');--}}
{{--    }--}}
{{--</script>--}}
{{--</html>--}}

{{--<!doctype html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <!-- CSRF Token -->--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--    <!-- Scripts -->--}}
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

{{--    <!-- Styles -->--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

{{--    <!-- Styles -->--}}
{{--    <link rel="stylesheet" href="{{ asset('css/app-new.css') }}" >--}}

{{--    <link  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel= "stylesheet">--}}
{{--    @yield('head')--}}
{{--    @notify_css--}}

{{--</head>--}}
{{--<body>--}}
{{--<div id="app">--}}
{{--    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--        <div class="container">--}}
{{--            <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                {{ config('app.name', 'Laravel') }}--}}
{{--            </a>--}}
{{--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"--}}
{{--                    aria-controls="navbarSupportedContent" aria-expanded="false"--}}
{{--                    aria-label="{{ __('Toggle navigation') }}">--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}

{{--            <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                <!-- Left Side Of Navbar -->--}}
{{--                <ul class="navbar-nav mr-auto">--}}

{{--                </ul>--}}

{{--                <!-- Right Side Of Navbar -->--}}
{{--                <ul class="navbar-nav ml-auto">--}}
{{--                    <!-- Authentication Links -->--}}
{{--                    @guest--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                        </li>--}}
{{--                        @if (Route::has('register'))--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                    @else--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <button class="btn btn-empty">--}}
{{--                                {{ auth()->user()->f_name }}--}}
{{--                            </button>--}}
{{--                            <button class="btn btn-empty">--}}
{{--                                <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                   onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                    {{ __('Logout') }}--}}
{{--                                </a>--}}

{{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
{{--                                      style="display: none;">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                            </button>--}}
{{--                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                   onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                    {{ __('Logout') }}--}}
{{--                                </a>--}}

{{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
{{--                                      style="display: none;">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    @endguest--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class='sidenav'>--}}
{{--            <nav class="navbar navbar-expand-md navbar-dark bg-primary">--}}
{{--                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="collapse navbar-collapse" id="navbarNavDropdown">--}}
{{--        <ul class="navbar-nav ml-auto">--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="#top">Home <span class="sr-only">(current)</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#top">Features</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#top">Pricing</a>--}}
{{--            </li>--}}
{{--            <!-- This menu is hidden in bigger devices with d-sm-none.--}}
{{--           The sidebar isn't proper for smaller screens imo, so this dropdown menu can keep all the useful sidebar itens exclusively for smaller screens  -->--}}
{{--            <!-- Smaller devices menu END -->--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--            </nav>--}}
{{--            </div>--}}
{{--            <nav class="col-md-2  d-md-block bg-light mt-4 sidebar">--}}
{{--                <div class="sidebar-sticky">--}}
{{--                    <h5 class='heading'>Basics</h5>--}}
{{--                    <ul class="nav flex-column">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link active" href="#">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
{{--                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
{{--                                     stroke-linejoin="round" class="feather feather-home">--}}
{{--                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>--}}
{{--                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>--}}
{{--                                </svg>--}}
{{--                                Newsfeed <span class="sr-only">(current)</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link active" href="#">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
{{--                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
{{--                                     stroke-linejoin="round" class="feather feather-home">--}}
{{--                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>--}}
{{--                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>--}}
{{--                                </svg>--}}
{{--                                Newsfeed <span class="sr-only">(current)</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </nav>--}}
{{--            <main role="main" class="py-4 col-md-9 ml-sm-auto col-lg-10 px-4">--}}
{{--                <div class="row justify-content-around">--}}
{{--                    <div class="col-md-8 col-lg-8 content-section">--}}
{{--                        @yield('content')--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3 col-lg-3 dashboard-section">--}}

{{--                            <h5 class='heading'>Dashboard</h5>--}}

{{--                            <!-- <div class="card">--}}
{{--                                <div class="card-header">Dashboard</div>--}}

{{--                                <div class="card-body">--}}
{{--                                    @if (session('status'))--}}
{{--                                        <div class="alert alert-success" role="alert">--}}
{{--                                            {{ session('status') }}--}}
{{--                                        </div>--}}
{{--                                    @endif--}}

{{--                                    You are logged in!--}}
{{--                                </div>--}}
{{--                            </div> -->--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </main>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@notify_js--}}
{{--@notify_render--}}
{{--@yield('scripts')--}}

{{--</body>--}}
{{--</html>--}}
