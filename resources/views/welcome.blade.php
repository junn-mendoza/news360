@extends('layout.layout')

@section('content')


    <!-- row 1 section  -->
    <div class='flex space-x-3 px-3 max-w-[2000px] mx-auto'>
        <div class='w-3/4'>
            @include('partials.home.video')
        </div>
        <div class='bg-transparent w-1/4'>
            @include('partials.components.topnews',['components' => $data['TOPNEWS'], 'withHeader' => true, 'withScroll' => true])
        </div>
    </div>
<div class='container mx-auto'>
    <div class='flex flex-col'>
    
   
    <div class='mt-4'>
    <!-- row 4 section  live-->
    @include('partials.home.live')
    </div>
    <div class='mt-4'>
    <!-- row 5 section  Schedule-->
        @include('partials.home.schedule')
    </div>
    <div class='mt-4'>
    <!-- row 7 section  Series-->
    @include('partials.home.latestnews')
   </div>
    </div>
</div>
   <div class='mt-4 w-full max-w-[2000px] mx-auto'>
    <!-- row 3 section  banner-->
    @include('partials.home.banner')
    </div>
<div class='container mx-auto'>  
    <div class='flex flex-col'>
        <div class='mt-4'>
            <!-- row 7 section  Series-->
            @include('partials.home.series')
        </div>
        <div class='mt-4'>
            <!-- row 6 section  Programs-->
            @include('partials.home.programs')
        </div>
        <!-- row 8 section  Category News-->
        @include('partials.home.category')
        <div class='mt-4'>
        <!-- row 9 section  Other News-->
        @include('partials.home.othernews')
        </div>
    </div>
</div>
@endsection

@pushOnce('js')

<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/home.js') }}"></script>
<script src="{{ asset('assets/js/swiper.js') }}"></script>
<script>
    let seriesEl = CustomSwiper('.home-series', 4);
    let programEl = CustomSwiper('.home-programs', 4);
    let latestnewsEl = CustomSwiper('.home-latestnews', 4);
    let othernewsEl = CustomSwiper('.home-othernews', 4);
    const progressCircle = document.querySelector(".autoplay-progress svg");
    const progressContent = document.querySelector(".autoplay-progress span");
    let categoryEl = CategorySwiper('.home-category', 1);
</script>
@endpushOnce