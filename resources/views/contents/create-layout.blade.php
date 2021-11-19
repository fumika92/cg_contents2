<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CG POST</title>
        
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Zen+Kurenaido&display=swap">
    </head>
    <body class="font">
      <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
          <!-- text - start -->
          <div class="mb-10 md:mb-16">
            <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">投稿作品のアップロード</h2>
          </div>
          <!-- text - end -->
      
          <!-- form - start -->
          <form action="/contents" method="POST" enctype="multipart/form-data" class="max-w-screen-md grid sm:grid-cols-2 gap-4 mx-auto">
      	  @csrf
      	  <!-- post - title -->
            <div class="sm:col-span-2">
              <label for="title" class="inline-block text-gray-800 text-sm sm:text-base mb-2">タイトル*</label>
              <input name="post[title]" value="{{ old('post.title') }}" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
              <p class='title__error' style='color:red'>{{ $errors->first('post.title') }}</p>
      	  </div>
      
      	  <!-- post - body -->
            <div class="sm:col-span-2">
              <label for="body" class="inline-block text-gray-800 text-sm sm:text-base mb-2">作品の説明*</label>
              <textarea name="post[body]" class="w-full h-64 bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2">{{ old('post.body') }}</textarea>
      		    <p class='body__error' style='color:red'>{{ $errors->first('post.body') }}</p>
            </div>
      	  
      	  <!-- post - image_path -->
      	  @yield('upImg')
      
      	  <!-- post - category -->
      	  <div class="relative inline-flex">
      		<svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="" fill-rule="nonzero"/></svg>
      		<select name="nav_category" size="1" class="h-10 pl-5 pr-10 focus:outline-none appearance-none">
      			@foreach ($categories as $category)
      			<option value="{{ $category->id }}">{{ $category->category_name }}</option>
      			@endforeach
      		</select>
      	  </div>
      
      	  <!-- form - button -->
            <div class="sm:col-span-2 flex justify-between items-center">
              <button class="inline-block bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">作成</button>
      
              <span class="text-gray-500 text-sm">*必須</span>
            </div>
            
          </form>
          
          <div class="sm:col-span-2">
            <a href="/">Back</a>
          </div>
          <!-- form - end -->
        </div>
      </div>
    </body>
</html>