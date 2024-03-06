@extends('layout.layout')

@section('content')
@php
    phpinfo();
@endphp
<div class='container mx-auto'>
    <!-- row 1 section  -->
    <div class='flex '>
        <div class='w-3/4'>
            @include('partials.home.video')
        </div>
        <div class='bg-gray-200 w-1/4'>
            @include('partials.home.topnews')
        </div>
    </div>
    <!-- row 2 section  promo-->
    @include('partials.home.promo')
    <!-- row 3 section  banner-->
    @include('partials.home.banner')
    <!-- row 4 section  live-->
    @include('partials.home.live')
    <!-- row 5 section  Schedule-->
    @include('partials.home.schedule')
    <!-- row 6 section  Programs-->
    @include('partials.home.program')
    <!-- row 7 section  Series-->
    @include('partials.home.series')
    <!-- row 8 section  Category News-->
    @include('partials.home.category')
    <!-- row 9 section  Other News-->
    @include('partials.home.othernews')
</div>
@endsection

@push('js')
//Enter your js code here
@endpush