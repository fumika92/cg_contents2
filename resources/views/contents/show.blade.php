@extends('contents.layout')

@section('main')
    <div class="main_contents">
        <article class="main_img">
          <img src="{{ $post->image_path }}">
        </article>
        <aside class="main_profile">
          <div class="main_profile_top">
            <img class="icon" src="{{ $post->user->image_path }}">
            <p><a href="/users/{{ $post->user_id }}">{{ $post->user->name }}</a></p>
          </div>
          <div class="main_profile_middle">
            <p>LIKE:{{ $post->users()->count('user_id') }}</p>
            @if($post->users()->where('user_id', Auth::id())->exists()) <!--exists()は存在すればTrue、しないならFalse-->
            <form action="{{ route('unlike', $post) }}" method="POST">
              @csrf
              <input type="submit" value="&#xf004;UNLIKE" class="fas fa-heart btn_unlike btn">
            </form>
            @else
            <form action="{{ route('like', $post) }}" method="POST">
              @csrf
              <input type="submit" value="&#xf004;Like" class="fas fa-heart btn_like btn">
            </form>
            @endif
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