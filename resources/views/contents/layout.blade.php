<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CG制作物投稿サイト</title>
        
        <link rel="stylesheet" href="/css/font.css">
        <link href='/css/ress.css'>
        <link href='/css/style.css' rel="stylesheet">
    </head>
    <body>
        <header>
          <h1><a href="/">CG制作投稿サイト</a></h1>
          <nav>
            <form class="main_nav_search" action="index.html" method="post">
              <input class="nav_search" type="search" name="nav_search" size="50" placeholder="検索">
              <select class="nav_category_select" name="nav_category" size="1">
                <option value="" label="カテゴリ"></option>
                <option value="" label="＜モデル＞"></option>
                <option value="" label="モデル（背景）"></option>
                <option value="" label="モデル（キャラクター）"></option>
                <option value="" label="モデル（モノ）"></option>
                <option value="" label="モデル（乗り物）"></option>
                <option value="" label="モデル（食べ物）"></option>
                <option value="" label="＜アニメーション＞"></option>
                <option value="" label="アニメーション（日常）"></option>
                <option value="" label="アニメーション（格闘）"></option>
                <option value="" label="アニメーション（フェイス）"></option>
                <option value="" label="アニメーション（トレス）"></option>
                <option value="" label="ポーズ（オリジナル）"></option>
                <option value="" label="ポーズ（トレス）"></option>
                <option value="" label="＜スクリプト＞"></option>
                <option value="" label="スクリプト"></option>
              </select>
              <button type="submit" name="search_button">検索</button>
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
                        <a href="/user/{{ $post->user_id }}/about">{{ Auth::user()->name }}</a>
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
            @yield('main')
        </main>

        <footer><p class="footer_p"><small>&copy; 2020 CGcotents</small></p></footer>
    </body>
</html>
