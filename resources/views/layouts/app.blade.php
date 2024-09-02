<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name')}}</title>

    
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <link href="../../css/app.css" rel="stylesheet">

   
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <label for="namel" title="Logo">
                    <img src="{{ asset('stades/image/logo2.png') }}" alt="logo" width="70" style="border-radius: 50%;">
                </label>
                <a class="navbar-brand fw-bold" title="Stadium Reservation" name="namel" style="float: left;margin-left:15px;" href="{{ url('/') }}"> Stadium Reservation</a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav me-auto">
                    </ul>
                    
                    <ul class="navbar-nav ms-auto">
                       
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <ul class="list-inline m-2 ml-4 d-flex justify-content-center">
                                <li class="list-inline-item fl">
                                    <a href="{{ route('stades.store') }}" class="text-decoration-none text-black" title="Home">Home</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ route('booking') }}" class="text-decoration-none text-black" title="Booking">Booking</a>
                                </li>
                                @if (Auth::user()->role_as === 1)
                                    <li class="list-inline-item fr">
                                        <a href="{{ route('users.show') }}" class="text-decoration-none text-black" title="Users">Users</a>
                                    </li>
                                @endif
                            </ul>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre title="{{ Auth::user()->name }}">    
                                    <span style="color: blue; font-weight: bold;">
                                        <img src="{{ asset('stades/image/user-profile.jpg') }}" title="{{ Auth::user()->name }}" alt="{{ Auth::user()->name }}" width="30">
                                        {{ Auth::user()->name }}
                                    </span>
                                    @if (Auth::user()->role_as === 1)
                                        (Admin)
                                    @endif                                  
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('profile.update') }}">{{ __('Profile') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                        @endguest
                </div>
            </div>
        </nav>

        <div style="padding-top: 70px;"> 
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
