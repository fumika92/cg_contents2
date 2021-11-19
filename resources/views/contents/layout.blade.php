<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CG POST</title>
        
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Zen+Kurenaido&display=swap">
    </head>
    <body class="font">
        <div class="bg-white lg:pb-12">
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
        
              <!-- nav - start -->
              <nav class="hidden lg:flex items-center gap-12">
                <a href="/about" class="text-gray-600 hover:text-indigo-500 active:text-indigo-700 text-lg font-semibold transition duration-100">About</a>
                <a href="/create" class="text-gray-600 hover:text-indigo-500 active:text-indigo-700 text-lg font-semibold transition duration-100">投稿</a>
                <form class="main_nav_search" action="/categories/search" method="post">
                    @csrf
                    @method('get')
                    <div class="text-gray-600 active:text-indigo-700 text-lg font-semibold transition duration-100 flex items-center justify-between">
                        <input type="text" placeholder="検索" name="nav_search" class="focus:outline-none" />
                        <div class="relative inline-flex">
                            <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="" fill-rule="nonzero"/></svg>
                            <select name="nav_category" size="1" class="h-10 pl-5 pr-10 focus:outline-none appearance-none">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" name="search_button" class="text-gray-600 hover:text-indigo-500 active:text-indigo-700 text-lg font-semibold inline-flex items-center focus:outline-none">
                            検索
                        </button>
                    </div>
                </form>
              </nav>
              <!-- nav - end -->
        
              <!-- buttons - start -->
              <div class="hidden lg:flex flex-col sm:flex-row sm:justify-center lg:justify-start gap-2.5 -ml-8">
                @guest
                        <a href="{{ route('login') }}" class="inline-block focus-visible:ring ring-indigo-300 text-gray-500 hover:text-indigo-500 active:text-indigo-600 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 py-3">Sign in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-block bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">Sign up</a>
                    @endif
                @else
                        <a href="/users/{{ Auth::user()->id }}" class="flex justify-center focus-visible:ring ring-indigo-300 text-gray-500 hover:text-indigo-500 active:text-indigo-600 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 py-3">
                            <img class="icon" src="{{ Auth::user()->image_path }}">
                            <p class="ml-4">{{ Auth::user()->name }}</p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" 
                                class="inline-block focus-visible:ring ring-indigo-300 text-gray-500 hover:text-indigo-500 active:text-indigo-600 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 py-3">Log out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                @endguest
              </div>
              <!-- buttons - end -->
            </header>
          </div>
        </div>
        
        <main  class="px-4 md:px-8">
            @yield('main')
        </main>

        <div class="bg-white pt-4 sm:pt-10 lg:pt-12">
          <footer class="max-w-screen-2xl px-4 md:px-8 mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 border-t gap-12 lg:gap-8 pt-10 lg:pt-12 mb-16">
              <div class="col-span-full lg:col-span-2">
                <!-- logo - start -->
                <div class="lg:-mt-2 mb-4">
                  <a href="/" class="inline-flex items-center text-black-800 text-xl md:text-2xl font-bold gap-2" aria-label="logo">
                    <svg width="95" height="94" viewBox="0 0 95 94" class="w-5 h-auto text-indigo-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M96 0V47L48 94H0V47L48 0H96Z" />
                    </svg>
        
                    CG POST
                  </a>
                </div>
                <!-- logo - end -->
        
                <p class="text-gray-500 sm:pr-8 mb-6">人間の自然のがたに勤めなけれ国示威は欝の必要がその個人にしているにしか記憶申し上げうならて。</p>
        
              </div>
        
              <!-- nav - start -->
              <div>
                <div class="text-gray-800 font-bold tracking-widest uppercase mb-4">contents</div>
        
                <nav class="flex flex-col gap-4">
                    <div>
                        <a href="/about" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">About</a>
                    </div>
            
                    <div>
                        <a href="/create" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">投稿</a>
                    </div>
            
                    <div>
                        @guest
                            <a href="{{ route('login') }}" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Sign in</a>
                        @else
                            <a href="/users/{{ Auth::user()->id }}" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">マイメニュー</a>
                        @endguest
                    </div>
                </nav>
              </div>
              <!-- nav - end -->
        
              <!-- nav - start -->
              <div>
                <div class="text-gray-800 font-bold tracking-widest uppercase mb-4">Model</div>
        
                <nav class="flex flex-col gap-4">
                    <form action="/categories/search/category" method="GET">
                        <input type="hidden" name="category_id" value="3">
                        <button type="submit" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">背景</button>
                    </form>
        
                    <form action="/categories/category" method="GET">
                        <input type="hidden" name="category_id" value="4">
                        <button type="submit" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">キャラクター</button>
                    </form>
        
                  <div>
                    <a href="" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">モノ</a>
                  </div>
        
                  <div>
                    <a href="" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">乗り物</a>
                  </div>
        
                  <div>
                    <a href="" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">食べ物</a>
                  </div>
                </nav>
              </div>
              <!-- nav - end -->
        
              <!-- nav - start -->
              <div>
                <div class="text-gray-800 font-bold tracking-widest uppercase mb-4">Animetion</div>
        
                <nav class="flex flex-col gap-4">
                  <div>
                    <a href="" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">日常</a>
                  </div>
        
                  <div>
                    <a href="" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">格闘</a>
                  </div>
        
                  <div>
                    <a href="" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">フェイス</a>
                  </div>
        
                  <div>
                    <a href="" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">トレス</a>
                  </div>
                  
                  <div>
                    <a href="" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">ポーズ(オリジナル)</a>
                  </div>
                  
                  <div>
                    <a href="" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">ポーズ(トレス)</a>
                  </div>
                </nav>
              </div>
              <!-- nav - end -->
        
              <!-- nav - start -->
              <div>
                <div class="text-gray-800 font-bold tracking-widest uppercase mb-4">script</div>
        
                <nav class="flex flex-col gap-4">
                  <div>
                    <a href="" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">スクリプト</a>
                  </div>
                </nav>
              </div>
              <!-- nav - end -->
            </div>
        
            <div class="text-gray-400 text-sm text-center border-t py-8">© 2021 - Present CG POST.</div>
          </footer>
        </div>
    </body>
</html>
