
@extends('contents.layout')

@section('main')
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
@endsection