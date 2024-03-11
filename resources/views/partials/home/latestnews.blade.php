<div class='latestnews-wrapper'>
    <div class=' font-montserrat text-3xl'>LATEST NEWS</div>
    <div class="swiper home-latestnews relative">
        <div class="swiper-wrapper">
        @foreach($data['LATESTNEWS'] as $latestnews)
            <div class="swiper-slide">
                <!--start here-->
                @include('partials.home.newscomponent', ['component' => $latestnews])
                <!--end here--> 
            </div>
        @endforeach
        </div>
       
        @include('partials.home.arrowcomponent')
        
    </div>
</div>