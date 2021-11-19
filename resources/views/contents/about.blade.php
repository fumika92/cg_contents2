@extends('contents.layout')

@section('main')
<div class="flex flex-col justify-center sm:text-center lg:text-left lg:py-12 xl:py-24">
    <p class="text-indigo-500 md:text-lg xl:text-xl font-semibold mb-4 md:mb-6">Posting of CG work</p>
    
    <h1 class="text-black-800 text-4xl sm:text-5xl md:text-6xl font-bold mb-8 md:mb-12">CG POST</h1>
    
    <p class="lg:w-4/5 text-gray-500 xl:text-lg leading-relaxed mb-8 md:mb-12">当時上のどう毎号一二二字が見せるまでの差を、何かいうだ発展がします時間はよほどされるのないが、時々別段学校をないて、その方から始めのに必要た好い読むたです。</p>
    
    <div class="flex flex-col sm:flex-row sm:justify-center lg:justify-start gap-2.5">
        <a href="/create" class="inline-block bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">投稿する</a>
        <a href="/" class="inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">Take tour</a>
    </div>
    </div>
    <!-- content - end -->
    
    <!-- image - start -->
    <div class="h-48 lg:h-auto bg-gray-100 overflow-hidden shadow-lg rounded-lg">
        <img src="/images/classroom.jpg" loading="lazy" class="w-full h-full object-cover object-center" />
    </div>
</div>
@endsection