<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Stylesheet --}}
    <link rel="stylesheet" href="{{asset(asset('css/style.css'))}}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-success shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h1 class="h5 mb-0 text-white">{{ config('app.name') }}</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            
                                <li class="nav-item" title="Properties">
                                    <a href="{{ route('property.create') }}" class="nav-link text-white">Add Property</a>
                                </li>
                                <li class="nav-item" title="Agent/Broker">
                                    <a href="{{route('broker.create')}}" class="nav-link text-white">Add Broker</a>
                                </li>
                            
                            
                            <li class="nav-item dropdown">
                                <button id="user-account" class="btn shadow-none nav-link text-white" data-bs-toggle="dropdown">
                                    @if (Auth::user()->avatar)
                                        <img src="#" alt="Auth::user()->avatar" class="rounded-circle avatar-sm">
                                    @else
                                        <i class="fa-solid fa-user-tie icon-sm"></i>
                                    @endif
                                </button>


                                {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a> --}}

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="user-account">
                                    {{-- Admin Controls --}}
                                    @can('admin')
                                        <a href="{{route('admin.users')}}" class="dropdown-item">
                                            <i class="fa-solid fa-user-gear"></i> Admin
                                        </a>

                                        <hr class="dropdown-divider">
                                    @endcan

                                    <a href="#" class="dropdown-item">
                                        <i class="fa-solid fa-user-tie icon-sm"></i> {{ Auth::user()->name }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            <div class="container-fluid">
                <div class="row justify-content-center mt-5">
                    <div class="col-2">
                        @if (request()->is('admin/*'))
                            <div class="list-group">
                                <a href="{{route('admin.users')}}" class="list-group-item {{request()->is('admin/users') ? 'active':''}}">
                                    <i class="fa-solid fa-user"></i> Manage Users
                                    <ul class="list-group">
                                        @isset($c_admin)
                                        <li class="list-group-item">
                                            Admin Count: <span class="badge text-bg-success">{{ $c_admin }}</span>
                                        </li>
                                        @endisset
                                        @isset($c_users)
                                        <li class="list-group-item">
                                            Users Count: <span class="badge text-bg-success">{{ $c_users }}</span>
                                        </li>
                                        @endisset
                                    </ul>
                                      
                                </a>
                                <a href="{{route('admin.properties')}}" class="list-group-item {{ request()->is('admin/properties')? 'Active':''}}">
                                    <i class="fa-solid fa-house-circle-check"></i> Manage Properties
                                    <ul class="list-group">
                                        @isset($c_forSale)
                                        <li class="list-group-item">
                                            For Sale: <span class="badge text-bg-success">{{$c_forSale}}</span>
                                        </li>
                                        @endisset
                                        @isset($c_forRent)
                                        <li class="list-group-item">
                                            For Rent: <span class="badge text-bg-success">{{$c_forRent}}</span>
                                        </li>
                                        @endisset
                                    </ul>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa-solid fa-people-arrows"></i> Manage Agents
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="col-10">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
