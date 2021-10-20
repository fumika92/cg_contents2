@extends('contents.layout')

@section('main')
    <h2>投稿一覧</h2>
    <div class="cg_contents_all">
        @foreach ($posts as $post)
            <a href="/contents/{{ $post->id }}"><img src="{{ $post->image_path }}"></a>
        @endforeach
    </div>
@endsection