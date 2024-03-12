<div class='othernews-wrapper'>
    <div class=' font-fraunces text-3xl'>OTHER NEWS</div>
    <div class="swiper home-othernews relative">
        <div class="swiper-wrapper">
        @foreach($data['OTHERNEWS'] as $othernews)
            <div class="swiper-slide">
                <!--start here-->
                @include('partials.home.newscomponent', ['component' => $othernews])
                <!--end here--> 
            </div>
        @endforeach
        </div>
       
        @include('partials.home.arrowcomponent')
        
    </div>
</div>