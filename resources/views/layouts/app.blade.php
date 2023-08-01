<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SPK Durian</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script   src="https://code.jquery.com/jquery-3.6.0.min.js"   integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="   crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
    <script src="
https://cdn.jsdelivr.net/npm/@ckeditor/ckeditor5-build-classic@36.0.0/build/ckeditor.min.js
"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>
{{--     
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> 
    @yield('head')
</head>
<body>
    <div id="app">
        <div class="container-fluid px-0">
        <nav class="navbar navbar-light bg-dark navbar-expand-md">
        <div class="navbar-collapse" id="navbarSupportedCnontent">
            <a class="navbar-brand text-light p-0" href="{{ url('/') }}">
                SISTEM PENDUKUNG KEPUTUSAN PENENTUAN VARIETAS DURIAN
            </a>
            <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto  ">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item bg-kuning rounded m-1 text-center">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item bg-kuning rounded m-1 text-center">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endguest
                    </ul>
        </div>
        </nav>
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm p-0">
                 
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto bg-kuning rounded">
                         <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                            </li>
                            
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('hitung') }}">{{ __('Penentuan Variates') }}</a>
                            </li>
                             <li class="nav-item">
                                    <a class="nav-link" href="{{ route('detailDTUlist') }}">{{ __('List Tentang Durian') }}</a>
                            </li>
                            @if (Route::has('login'))
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li> --}}
                            @endif

                            @if (Route::has('register'))
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> --}}
                            @endif
                        @else
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                            </li>
                            
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('hitung') }}">{{ __('Penentuan Variates') }}</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('detailDTUlist') }}">{{ __('Tentang Durian') }}</a>
                            </li>
                            <div class="dropdown">
                            <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('Setting') }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="nav-link" href="{{ route('kriteria') }}">{{ __('Kriteria') }}</a></li>
                                    <li><a class="nav-link" href="{{ route('value-set') }}">{{ __('Value Set') }}</a></li>
                                    <li><a class="nav-link" href="{{ route('bobot-selisih') }}">{{ __('Bobot Selisih') }}</a></li>
                                     <li><a class="nav-link" href="{{ route('data-uji') }}">{{ __('Data Uji Alternatif') }}</a></li>
                                    <li><a class="nav-link" href="{{ route('detailDTU') }}">{{ __('Keterangan Data Uji') }}</a></li>
                            </div>
                            </div>
                            <div class="dropdown">
                            <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                            </div>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto bg-warning rounded">
                      
                    </ul>
                </div>
            </div>
        </nav>
        

        <main class="">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
