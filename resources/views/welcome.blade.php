@extends('layout.layout')

@section('content')

<div class='container mx-auto'>
    <!-- row 1 section  -->
    <div class='flex space-x-3'>
        <div class='w-2/3'>
            @include('partials.home.video')
        </div>
        <div class='bg-transparent w-1/3'>
            @include('partials.home.topnews')
        </div>
    </div>
    <div class='flex flex-col'>
    <!-- row 2 section  promo-->
    @include('partials.home.promo')
    <!-- row 3 section  banner-->
    @include('partials.home.banner')
    <!-- row 4 section  live-->
    @include('partials.home.live')
    <div class='mt4'>
    <!-- row 5 section  Schedule-->
        @include('partials.home.schedule')
    </div>
    <div class='mt4'>
    <!-- row 7 section  Series-->
    @include('partials.home.latestnews')
   </div>
   <div class='mt4'>
    <!-- row 7 section  Series-->
    @include('partials.home.series')
   </div>
   <div class='mt4'>
    <!-- row 6 section  Programs-->
    @include('partials.home.programs')
    </div>
    <!-- row 8 section  Category News-->
    @include('partials.home.category')
    <!-- row 9 section  Other News-->
    @include('partials.home.othernews')
    </div>
</div>
@endsection

@pushOnce('js')

<script src="{{ asset('assets/js/home.js') }}"></script>
<script src="{{ asset('assets/js/swiper.js') }}"></script>
<script>
    let seriesEl = CustomSwiper('.home-series', 4);
    let programEl = CustomSwiper('.home-programs', 4);
    let latestnewsEl = CustomSwiper('.home-latestnews', 4);
    let othernewsEl = CustomSwiper('.home-othernews', 4);
</script>
@endpushOnce