@extends('contents.layout')

@section('main')
    <div class="user_profile">
        <img class="icon" src="{{ $user->image_path }}">
        <p>{{ $user->name }}</p>
        <button type="button" name="btn_edit"><a href="/users/{{ $user->id }}/edit">編集</a></button>
    </div>
    <div class="user_profile_button">
        <button type="button" name="btn_about"><a href="/users/{{ $user->id }}">自己紹介</a></button>
        <button type="button" name="btn_work"><a href="/users/{{ $user->id }}/work">投稿</a></button>
        <button type="button" name="btn_like"><a href="/users/{{ $user->id }}/like">いいね</a></button>
    </div>
    <div class="cg_contents_all">
        @foreach ($likes as $like)
            <a href="/contents/{{ $like->id }}"><img src="{{ $like->image_path }}"></a>
        @endforeach
    </div>
    <div class="paginate">
        {{ $likes->links() }}
    </div>
@endsection