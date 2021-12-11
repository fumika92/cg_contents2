@extends('contents.layout')

@section('main')
<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="max-w-screen-lg px-4 md:px-8 mx-auto">
    <div class="grid md:grid-cols-2 gap-8">
      <!-- images - start -->
      <div class="space-y-4">
        <div class="bg-gray-100 rounded-lg overflow-hidden relative">
          <img src="{{ $post->image_path }}" loading="lazy" class="w-full h-full object-cover object-center" />

          @if ($post->category == '')
          @else
            <span class="bg-red-500 text-white text-sm tracking-wider uppercase rounded-br-lg absolute left-0 top-0 px-3 py-1.5">{{$post->category->category_name}}</span>
          @endif
        </div>

      </div>
      <!-- images - end -->

      <!-- content - start -->
      <div class="md:py-8">
        <!-- name - start -->
        <div class="mb-2 md:mb-3">
          <span class="inline-block text-gray-500 mb-0.5"><a href="/users/{{ $post->user_id }}">{{ $post->user->name }}</a></span>
          <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold">{{ $post->title }}</h2>
        </div>
        <!-- name - end -->

        <!-- date notice - start -->
        <div class="flex items-center text-gray-500 gap-2 mb-6">

          <span class="text-sm">{{ $post->updated_at->format('Y年m月d日') }}</span>
        </div>
        <!-- date notice - end -->

        <!-- LIKE-buttons - start -->
        <div class="flex gap-2.5">
          <span class="inline-block flex-1 sm:flex-none flex justify-center items-center bg-white text-gray-400 text-sm font-semibold text-center border border-transparent rounded-md">Like:{{ $post->users()->count('user_id') }}</span>
          
          @if($post->users()->where('user_id', Auth::id())->exists()) <!--exists()は存在すればTrue、しないならFalse-->
            <form action="{{ route('unlike', $post) }}" method="POST">
              @csrf
              <input type="submit" value="UNLIKE" class="p-1 pl-3 pr-3 bg-transparent text-sm rounded-lg bg-blue-300 text-white">
            </form>
          @else
            <form action="{{ route('like', $post) }}" method="POST">
              @csrf
              <input type="submit" value="Like" class="p-1 pl-3 pr-3 bg-transparent text-sm rounded-lg bg-red-300 text-white">
            </form>
          @endif
        </div>
        <div class="flex gap-2.5">
        @guest
          @else
          @if (Auth::user()->id !== $post->user->id)
          @else
            <div class="pt-6">
            <button type="button" name="btn_edit" class="pb-1 text-gray-700 hover:text-opacity-70"><a href="/contents/{{ $post->id }}/edit">編集する</a></button>
              <form action='/contents/{{ $post->id }}' id='form_{{ $post->id }}' method='post'>
                @csrf
                @method('DELETE')
                <button type="submit" name="btn_delete" class="text-gray-700 hover:text-opacity-70">消去する</button>
              </form>
            </div>
          @endif
        @endguest
        </div>
        <!-- LIKE-buttons - end -->
      </div>
      <!-- content - end -->

      <!-- description - start -->
      <div class="mt-7">
        <div class="text-gray-800 text-lg font-semibold mb-3">Description</div>

        <p class="text-gray-500">
          {{ $post->body }}
        </p>
      </div>
      <!-- description - end -->
    </div>
  </div>

  <!-- コメント！レビュー -->

  <div class="max-w-screen-md px-4 mx-auto mt-10">
    <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-8 xl:mb-12">Comments</h2>

    <div class="flex justify-between items-center border-t border-b py-4 mb-4">
      <div class="flex flex-col gap-0.5">
        <span class="block font-bold">コメントを書く</span>
	  @guest
        <span class="block text-gray-500 text-sm">コメントをするにはログインが必須です</span>
      @else
        <div class="flex justify-between items-center">
          <img class="icon" src="{{ $user->image_path }}">
          <form action="{{ route('comment', $post) }}" method="POST" enctype="multipart/form-data" class="pl-10">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea name="comment[body]" placeholder="コメントを入力してください" class="w-96 h-24 bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2"></textarea>
            <p class="body__error" style="color:red">{{ $errors->first('comment.body') }}</p>
            <button type="submit" name="btn_comment" class="inline-block bg-white hover:bg-gray-100 active:bg-gray-200 focus-visible:ring ring-indigo-300 border text-gray-500 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 md:px-8 py-2 md:py-3">コメントする</button>
          </form>
        </div>
      @endguest
      </div>

      
    </div>

    <div class="divide-y">
    <!-- coments - start -->
      @foreach ($post->comments as $comment)
        <div class="flex flex-col gap-3 py-4 md:py-8">
          <div>
            <span class="block text-sm font-bold">{{ $comment->user->name }}</span>
            <span class="block text-gray-500 text-sm">{{ $comment->updated_at->format('Y年m月d日') }}</span>
          </div>
          @guest
          @else
            @if (Auth::user()->id !== $comment->user->id)
            @else
              <form action='{{ route('comment_delete', $post) }}' method='POST'>
              @csrf
              @method('DELETE')
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                <button type="submit" name="btn_comment_delete" class="inline-block bg-white hover:bg-gray-100 active:bg-gray-200 focus-visible:ring ring-indigo-300 border text-gray-500 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 md:px-8 py-2 md:py-3">消去する</button>
              </form>
            @endif
          @endguest
          <p class="text-gray-600">{{ $comment->body }}</p>
        </div>
      @endforeach
    <!-- comments - end -->
    </div>

	<a href="/">Back</a>
  </div>
</div>
@endsection