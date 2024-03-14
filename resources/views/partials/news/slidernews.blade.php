

<div class='othernews-wrapper'>
    <div class=' font-fraunces text-3xl'>{{ $title }}</div>
    <div class="swiper {{$class}} relative">
        <div class="swiper-wrapper">
        @foreach($data[$key] as $news)
            <div class="swiper-slide">
                <!--start here-->
                @include('partials.home.newscomponent', ['component' => $news])
                <!--end here--> 
            </div>
        @endforeach
        </div>
       
        @include('partials.home.arrowcomponent')
        
    </div>
</div>