@extends('contents.layout')

@section('main')
    <div class="text-gray-600 container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
       <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
           <img class="object-cover object-center rounded" src="{{ $user->image_path }}">
       </div>
       <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
           <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-800">
              {{ $user->name }}
           </h1>
           @if (Auth::user()->id !== $user->id)
           @else
              <div class="flex justify-center">
                 <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"><a href="/users/{{ $user->id }}/edit">編集</a></button>
                 <button class="ml-4 inline-flex text-gray-600 bg-white border-0 py-2 px-6 focus:outline-none hover:text-indigo-500 rounded text-lg shadow-md">ログアウト</button>
              </div>
           @endif
       </div>
    </div>
    <div id="app_user_about">
        <div class="user_tabs grid grid-cols-3 gap-5">
            <button v-on:click="change('1')" v-bind:class="{'active': isActive === '1'}" class="focus text-gray-600 hover:text-indigo-500 focus:text-white p-4 rounded bg-white focus:bg-indigo-500 text-lg shadow-md">
                    自己紹介
            </button>
            <button v-on:click="change('2')" v-bind:class="{'active': isActive === '2'}" class="p-4 rounded bg-white focus:bg-indigo-500 text-gray-600 hover:text-indigo-500 focus:text-white text-lg shadow-md">
                    投稿作品
            </button>
            <button v-on:click="change('3')" v-bind:class="{'active': isActive === '3'}" class="p-4 rounded bg-white focus:bg-indigo-500 text-gray-600 hover:text-indigo-500 focus:text-white text-lg shadow-md">
                    いいね
            </button>
        </div>
        <div class="user_contents">
            <!-- about -->
            <div v-if="isActive === '1'" class="shadow-xl border border-gray-100 font-light p-8 rounded text-gray-500 bg-white mt-6">
                {{ $user->body }}
            </div>
            
            <!-- work -->
            <div v-else-if="isActive === '2'" class="shadow-xl border border-gray-100 font-light p-8 rounded text-gray-500 bg-white mt-6">
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 md:gap-x-6 gap-y-6">
                    @foreach ($own_posts as $post)
                    <!-- product - start -->
                        <div>
                            <a href="/contents/{{ $post->id }}" class="group h-96 block bg-gray-100 rounded-lg overflow-hidden shadow-lg mb-2 lg:mb-3">
                                <img src="{{ $post->image_path }}" loading="lazy" alt="Photo by Austin Wade" class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200" />
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
            
            <!-- like -->
            <div v-else-if="isActive === '3'" class="shadow-xl border border-gray-100 font-light p-8 rounded text-gray-500 bg-white mt-6">
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 md:gap-x-6 gap-y-6">
                    @foreach ($likes as $like)
                    <!-- product - start -->
                        <div>
                            <a href="/contents/{{ $like->id }}" class="group h-96 block bg-gray-100 rounded-lg overflow-hidden shadow-lg mb-2 lg:mb-3">
                                <img src="{{ $like->image_path }}" loading="lazy" alt="Photo by Austin Wade" class="w-full h-full object-cover object-center group-hover:scale-110 transition duration-200" />
                            </a>
                            
                            <div class="flex flex-col">
                                <span class="text-gray-500"><a href="/users/{{ $like->user->id }}">{{ $like->user->name }}</span>
                                <a href="/contents/{{ $like->id }}" class="text-gray-800 hover:text-gray-500 text-lg lg:text-xl font-bold transition duration-100">{{ $like->title }}</a>
                            </div>
                        </div>
                    <!-- product - end -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    <!-- script -->
    <script src="/js/vue.js"></script>
    <script src="/js/app2.js"></script>
@endsection