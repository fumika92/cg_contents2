<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CG POST</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Zen+Kurenaido&display=swap">
</head>
<body class="font">
    <div id="app">
        <div class="bg-white">
            <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
                <header class="flex justify-between items-center py-4 md:py-8">
                    <!-- logo - start -->
                    <a href="/" class="inline-flex items-center text-black-800 text-2xl md:text-3xl font-bold gap-2.5" aria-label="logo">
                        <svg width="95" height="94" viewBox="0 0 95 94" class="w-6 h-auto text-indigo-500" fill="currentColor" xmlns="">
                            <path d="M96 0V47L48 94H0V47L48 0H96Z" />
                        </svg>
                        CG POST
                    </a>
                    <!-- logo - end -->
                        
                    <nav class="hidden lg:flex items-center gap-12">
                        <!-- Authentication Links -->
                        @guest
                            <a href="{{ route('login') }}" class="inline-block focus-visible:ring ring-indigo-300 text-gray-500 hover:text-indigo-500 active:text-indigo-600 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 py-3">ログイン</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-block bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">登録</a>
                            @endif
                        @else
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
    
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('ログアウト') }}
                                </a>
    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        @endguest
                    </nav>
                </header>
            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
