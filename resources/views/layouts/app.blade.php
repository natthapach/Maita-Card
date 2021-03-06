<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Search Engine -->
    <meta name="description" content="Around with Gift & Promotion">
    <!-- Schema.org for Google -->
    <meta itemprop="name" content="Maita-Card">
    <meta itemprop="description" content="Around with Gift & Promotion">
    <meta itemprop="image" content="http://placehold.it/700x400">
    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta name="og:title" content="Maita-Card">
    <meta name="og:description" content="Around with Gift & Promotion">
    <meta name="og:url" content="http://maita-card.test">
    <meta name="og:site_name" content="Maita-Card">
    <meta name="og:type" content="website">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack("js")
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack("css")

</head>
<body>
    <div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/maitahome') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">


                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Shop Category
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                            <a class="dropdown-item" href="{{ url('/maitahome/shops') }}">all shops</a>
                            <a class="dropdown-item" href="{{ url('/maitahome/shops/restaurant')}}">restaurant</a>
                            <a class="dropdown-item" href="{{ url('/maitahome/shops/cafe')}}">cafe</a>
                            <a class="dropdown-item" href="{{ url('/maitahome/shops/salon')}}">salon</a>
                            <a class="dropdown-item" href="{{ url('/maitahome/shops/fitness')}}">fitness</a>
                            <a class="dropdown-item" href="{{ url('/maitahome/shops/cinema')}}">cinema</a>
                            <a class="dropdown-item" href="{{ url('/maitahome/shops/mall')}}">mall</a>

                          </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->role === "customer")
                                    <a class="dropdown-item" href='{{ url("/profile/" . Auth::user()->id) }}'>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href='{{ url("/". Auth::user()->id) . "/qr-code/My"}}'>
                                        My QR code 
                                    </a>
                                    <a class="dropdown-item" href='{{ url("/my-usage-history")}}'>
                                        My Usage History 
                                    </a>
                                    <a class="dropdown-item" href='{{ url("/my-checkin-history")}}'>
                                        My Check In History 
                                    </a>
                                    <a class="dropdown-item" href='{{ url("/" . Auth::user()->id . "/scan") }}'>
                                        Check in
                                    </a>
                                    @elseif(Auth::user()->role === "owner")
                                    <a class="dropdown-item" href='{{ url("/profile/" . Auth::user()->id) }}'>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href='{{ url("maitahome/shops/allshops") }}'>
                                        Shop Manage
                                    </a>
                                    @else
                                    <a class="dropdown-item" href='{{ url("/profile/" . Auth::user()->id) }}'>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href='{{ url("/work-his") }}'>
                                        Working history
                                    </a>
                                    <a class="dropdown-item" href='{{ url("/reward-history") }}'>
                                        Reward history
                                    </a>
                                    <a class="dropdown-item" href='{{ url("/employee-work-branch") }}'>
                                        Scan QR code
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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

        <main class="py-4">
            @yield('content')
        </main>





    </div>
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Contact Us via</p>
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

</body>
</html>
