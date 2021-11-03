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
          @guest
          @else
            @if (Auth::user()->id !== $post->user->id)
            @else
              <div class="main_profile_under">
                <button type="button" name="btn_edit"><a href="/contents/{{ $post->id }}/edit">編集する</a></button>
                <form action='/contents/{{ $post->id }}' id='form_{{ $post->id }}' method='post'>
                  @csrf
                  @method('DELETE')
                  <button type="submit" name="btn_delete">消去する</button>
                </form>
              </div>
            @endif
          @endguest
        </aside>
    </div>
    <div class="main_description">
        <h2>{{ $post->title }}</h2>
        <p>
          {{ $post->body }}
        </p>
        <p>{{ $post->updated_at->format('Y年m月d日') }}</p>
    </div>
    <div class="comment_store">
      @guest
        <div class="comment_guest">
          <img class="icon" src="">
          <textarea readonly placeholder="コメントするにはログインが必須です"></textarea>
        </div>
      @else
        <div class="comment_form">
          <img class="icon" src="{{ $user->image_path }}">
          <form action="{{ route('comment', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea rows="4" name="comment[body]" placeholder="コメントを入力してください"></textarea>
            <p class="body__error" style="color:red">{{ $errors->first('comment.body') }}</p>
            <button type="submit" name="btn_comment">コメントする</button>
          </form>
        </div>
      @endguest
    </div>
    @foreach ($post->comments as $comment)
      <div class="comment">
          <img class="icon" src="{{ $comment->user->image_path }}">
          <div class="comment_text">
            <p>{{ $comment->user->name }}</p>
            <p>{{ $comment->updated_at->format('Y年m月d日') }}</p>
            <p>{{ $comment->body }}</p>
            @if (Auth::user()->id !== $comment->user->id)
            @else
              <form action='{{ route('comment_delete', $post) }}' method='POST'>
                @csrf
                @method('DELETE')
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                <button type="submit" name="btn_comment_delete">消去する</button>
              </form>
            @endif
          </div>
      </div>
    @endforeach
    </div>
    <a href="/">back</a>
@endsection