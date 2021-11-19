<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CG制作物投稿サイト</title>
        
        <link rel="stylesheet" href="/css/font.css">
        <link href='/css/style.css' rel="stylesheet">
    </head>
    <body>
        <header>
          <h1><a href="/">CG制作物投稿サイト</a></h1>
          <nav>
            <form class="main_nav_search" action="/categories/search" method="post">
                @csrf
                @method('get')
                <span class="nav_search_span">
                    <input class="nav_search" type="text" name="nav_search" size="50" placeholder="検索">
                </span>
                <select class="nav_category_select" name="nav_category" size="1">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                <button class="btn_search" type="submit" name="search_button">検索</button>
            </form>
            <ul class="main_nav_list">
                @guest
                    <li>
                        <a href="{{ route('login') }}">ログイン</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">サインアップ</a>
                        </li>
                    @endif
                @else
                    <li>
                        <a href="/users/{{ Auth::user()->id }}">{{ Auth::user()->name }}</a>
                    </li>
                    <li>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                    <li><a href="/create">投稿する</a></li>
                @endguest
            </ul>
          </nav>
        </header>
        <main class="home_main wrapper">
            @if (empty($posts_search) && empty($posts_category))
                <h2>検索結果が0件でした......</h2>
            @elseif (!empty($posts_search) && empty($posts_category))
                <h2>全{{ $posts_search->count() +  $posts_category->count() }}件見つかりました</h2>
                <div class="cg_contents_all">
                    @foreach ($posts_search as $post)
                        <a href="/contents/{{ $post->id }}"><img src="{{ $post->image_path }}"></a>
                    @endforeach
                </div>
            @elseif (empty($posts_search) && !empty($posts_category))
                <h2>全{{ $posts_category->count() }}件見つかりました</h2>
                <div class="cg_contents_all">
                    @foreach ($posts_category as $post)
                        <a href="/contents/{{ $post->id }}"><img src="{{ $post->image_path }}"></a>
                    @endforeach
                </div>
            @else
                <h2>全{{ $posts_search->count() +  $posts_category->count() }}件見つかりました</h2>
                <div class="cg_contents_all">
                    @foreach ($posts_search as $post)
                        <a href="/contents/{{ $post->id }}"><img src="{{ $post->image_path }}"></a>
                    @endforeach
                    @foreach ($posts_category as $post)
                        <a href="/contents/{{ $post->id }}"><img src="{{ $post->image_path }}"></a>
                    @endforeach
                </div>
            @endif
        </main>

        <footer><p class="footer_p"><small>&copy; 2020 CGcotents</small></p></footer>
    </body>
</html>
