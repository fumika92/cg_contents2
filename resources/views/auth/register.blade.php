@extends('layouts.app')

@section('content')
<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
        <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-8">アカウントの登録</h2>
        <form class="max-w-lg border rounded-lg mx-auto" method="POST" action="{{ route('register') }}">
            @csrf
            
            <!--  ニックネーム - start  -->
            <div class="flex flex-col gap-4 p-4 md:p-8">
                <div>
                    <label for="name" class="inline-block text-gray-800 text-sm sm:text-base mb-2">{{ __('ニックネーム') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            <!--  ニックネーム - end  -->
    
            <!--  メールアドレス - start  -->
            <div>
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>
    
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!--  メールアドレス - end  -->
    
            <!--  パスワード - start  -->
            <div>
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>
    
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" name="password" required autocomplete="new-password">
    
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!--  パスワード - end  -->
    
            <div>
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワードをもう1度入力してください') }}</label>
    
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control is-invalid w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <button type="submit" class="block bg-gray-800 hover:bg-gray-700 active:bg-gray-600 focus-visible:ring ring-gray-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">
                {{ __('登録') }}
            </button>
        </form>
    </div>
</div>
@endsection
