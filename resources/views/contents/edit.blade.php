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
          <h1>CG作品の編集</h1>
        </header>
        <main class="home_main wrapper">
          <form action="/contents/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="main_contents">
              <article class="main_img">
                <div>
                  <label for="title">タイトル</label>
                  <input type="text" name="post[title]" placeholder="タイトル名を入力してください" value="{{ $post->title }}">
                  <p class='title__error' style='color:red'>{{ $errors->first('post.title') }}</p>
                </div>
                <div>
                  <label for="body">作品の説明</label>
                  <textarea name="post[body]" placeholder="説明文を入力してください">{{ $post->body }}</textarea>
                  <p class='body__error' style='color:red'>{{ $errors->first('post.body') }}</p>
                </div>
              </article>
              <aside class="main_profile">
                <input type="file" name="image" value="{{ $post->image_path }}">
                <input type="file" name="file">
                <select class="nav_category_select" name="post[category_id]" size="1">
                    <option value="1" label="カテゴリ"></option>
                    <option value="2" label="＜モデル＞"></option>
                    <option value="3" label="モデル（背景）"></option>
                    <option value="4" label="モデル（キャラクター）"></option>
                    <option value="5" label="モデル（モノ）"></option>
                    <option value="6" label="モデル（乗り物）"></option>
                    <option value="7" label="モデル（食べ物）"></option>
                    <option value="8" label="＜アニメーション＞"></option>
                    <option value="9" label="アニメーション（日常）"></option>
                    <option value="10" label="アニメーション（格闘）"></option>
                    <option value="11" label="アニメーション（フェイス）"></option>
                    <option value="12" label="アニメーション（トレス）"></option>
                    <option value="13" label="ポーズ（オリジナル）"></option>
                    <option value="14" label="ポーズ（トレス）"></option>
                    <option value="15" label="＜スクリプト＞"></option>
                    <option value="16" label="スクリプト"></option>
                </select>
              </aside>
            </div>
            <input type="submit" value="確定">
          </form>
    
          <div class="main_description">
            <a href="/">back</a>
          </div>
        </main>
        <footer><p class="footer_p"><small>&copy; 2020 CGcotents</small></p></footer>
    </body>
</html>