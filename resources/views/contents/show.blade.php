@extends('contents.layout')

@section('main')
    <div class="main_contents">
        <article class="main_img">
          <img src="{{ $post->image_path }}">
        </article>
        <aside class="main_profile">
          <div class="main_profile_top">
            <img class="icon" src="">
            <p>{{ $post->user->name }}</p>
          </div>
          <div class="main_profile_under">
            <button type="button" name="btn_edit"><a href="/contents/{{ $post->id }}/edit">編集する</a></button>
            <form action='/contents/{{ $post->id }}' id='form_{{ $post->id }}' method='post'>
              @csrf
              @method('DELETE')
              <button type="submit" name="btn_delete">消去する</button>
            </form>
          </div>
        </aside>
    </div>
    <div class="main_description">
        <h2>{{ $post->title }}</h2>
        <p>
          {{ $post->body }}
        </p>
        <p>{{ $post->updated_at->format('Y年m月d日') }}</p>
    </div>
    <div class="comment">
        <img class="icon" src="image04.jpg">
        <div class="comment_text">
          <p>ユーザー名</p>
          <p>〇年〇月〇日</p>
          <p>ダミーテキストダミーテキストダミーテキストダミーテキストダミーテキス
            トダミーテキストダミーテキストダミーテキストダミーテキスト</p>
        </div>
    </div>
    <a href="/">back</a>
@endsection