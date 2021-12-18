
@extends('contents.layout')

@section('main')
    @if (empty($posts_search) && empty($posts_category))
        <h2>検索結果が0件でした......</h2>
    @elseif (!empty($posts_search) && empty($posts_category))
        <h2>全{{ $posts_search->count() }}件見つかりました</h2>
        <div class="cg_contents_all">
            @foreach ($posts_search as $post)
                <!-- product - start -->
                <div>
                    <a href="/contents/{{ $post->id }}" class="group h-96 block bg-gray-100 rounded-lg overflow-hidden shadow-lg mb-2 lg:mb-3">
                    <img src="{{ $post->image_path }}" loading="lazy" alt="Photo by Austin Wade" class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200" />
                    <video src="{{ $post->image_path }}" autoplay preload="none"></video>
                </a>
                
                <div class="flex flex-col">
                    <span class="text-gray-500"><a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</span>
                    <a href="/contents/{{ $post->id }}" class="text-gray-800 hover:text-gray-500 text-lg lg:text-xl font-bold transition duration-100">{{ $post->title }}</a>
                    </div>
                </div>
                <!-- product - end -->
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