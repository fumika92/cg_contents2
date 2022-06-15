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
            <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">ユーザー情報の編集</h2>
          </div>
          <!-- text - end -->
      
          <!-- form - start -->
          <form action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data" class="max-w-screen-md grid sm:grid-cols-2 gap-4 mx-auto">
      	  @csrf
          @method('put')
      	  <!-- ユーザー名 - title -->
          <div class="sm:col-span-2">
            <label for="name" class="inline-block text-gray-800 text-sm sm:text-base mb-2">ユーザー名</label>
            <input name="user[name]" value="{{ $user->name }}" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
            <p class='name__error' style='color:red'>{{ $errors->first('user.name') }}</p>
      	  </div>
      
      	  <!-- 自己紹介 - body -->
          <div class="sm:col-span-2">
            <label for="body" class="inline-block text-gray-800 text-sm sm:text-base mb-2">自己紹介</label>
            <textarea name="user[body]" class="w-full h-64 bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2">{{ $user->body }}</textarea>
    		    <p class='body__error' style='color:red'>{{ $errors->first('user.body') }}</p>
          </div>

          <!-- メールアドレス - body -->
          <div class="sm:col-span-2">
            <label for="email" class="inline-block text-gray-800 text-sm sm:text-base mb-2">メールアドレス</label>
            <input name="user[email]" value="{{ $user->email }}" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
            <p class='email__error' style='color:red'>{{ $errors->first('user.email') }}</p>
      	  </div>
      	  
      	  <!-- post - image_path -->
      	  <div class="grid grid-cols-1 space-y-2">
            <label class="text-sm font-bold text-gray-500 tracking-wide">アイコン画像を添付</label>
            <div class="flex items-center justify-center w-full">
                <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                    <div class="h-full w-full text-center flex flex-col items-center justify-center items-center  ">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        <p class="pointer-none text-gray-500 "><span class="text-sm">ドラッグ＆ドロップ</span> <br /> または <span class="text-blue-600 hover:underline">ファイルを選択</span> してください</p>
                    </div>
                    <input  name="image" value="{{ $user->image_path }}" type="file" class="hidden">
                    <p class='image__error' style='color:red'>{{ $errors->first('image') }}</p>
                </label>
            </div>
          </div>
      
      	  <!-- form - button -->
          <div class="sm:col-span-2 flex justify-between items-center">
            <button class="inline-block bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">確定</button>
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