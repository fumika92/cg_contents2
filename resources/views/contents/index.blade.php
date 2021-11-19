
@extends('contents.layout')

@section('main')
    <div class="bg-white py-6 sm:py-8 lg:py-12">
      <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
        
        <div class="flex justify-between items-end gap-4 mb-6">
          <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold">投稿一覧</h2>
        </div>
    
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 md:gap-x-6 gap-y-6">
        @foreach ($posts as $post)
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
      </div>
      <div class="paginate">
        {{ $posts->links() }}
      </div>
    </div>
@endsection