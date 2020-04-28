<!DOCTYPE html>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo asset('css/layout.css')?>" type="text/css"> 
    <link href="https://fonts.googleapis.com/css2?family=Purple+Purse&family=Ubuntu:ital,wght@1,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="mb-0">
    <div id="app">


        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
                <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('../image/logo.png') }}" width="40px" height="40px" alt="">
                wannaBUY
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                 
                 <!-- メニュー -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">ホーム<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.create') }}">出品<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts.index') }}">掲示板</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('productComments.index') }}">交渉依頼</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contacts.index') }}">お問い合わせ</a>
                        </li> 
                    </ul>

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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="{{ Auth::user()->image }}" alt="" class="nav-image"> 
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{ route('users.index') }}" class="dropdown-item">マイページへ</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    ログアウト
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

        <main class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-sm-12">
                        <div class="card my-3">
                            @if (session('message'))
                                <div class="alert alert-success">{{ session('message') }}</div>
                            @endif
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
                  
        </main>   
    </div>

    <div class="footer">        
        <a class="footer-heading" href="{{ url('/') }}">wannaBUY</a>
    </div>

    　
</body>
</html>
