<div class='series-wrapper'>
    
    <div class="swiper home-category relative">
        <div class="swiper-wrapper">
        @foreach($data['newsSlider']['CATEGORY'] as $key => $value)
            <div class="swiper-slide">
                <!--start here-->
                
                <div class='flex space-x-4'>
                    <div class='w-2/3 h-[690px] rounded-lg overflow-hidden shadow-md relative'>
                        @include('partials.components.overlayblack')
                        @include('partials.components.overlaytitle',[$size = 'text-6xl',$title = $data['newsSlider'][$key][0]->title])
                        <div class='absolute font-montserrat text-lg rounded-full text-white  bg-red-600 bg-opacity-80 py-2 px-6 left-5 top-5'>{{ $key }}</div>
                        <img src="{{ $data['newsSlider'][$key][0]->files[0]->url }}" class='object-cover w-full h-full'/>
                    </div>
                    <div class='w-1/3 h-full flex flex-col space-y-4 '>
                        <div class='h-[337px] rounded-lg overflow-hidden shadow-md relative'>
                        @include('partials.components.overlayblack')
                        @include('partials.components.overlaytitle',[$size = 'text-3xl',$title = $data['newsSlider'][$key][1]->title])
                        
                            <img src="{{ $data['newsSlider'][$key][1]->files[0]->url }}" class='object-cover'/>
                        </div>
                        <div class='h-[337px] rounded-lg overflow-hidden shadow-md relative'>
                            @include('partials.components.overlayblack')
                            @include('partials.components.overlaytitle',[$size = 'text-3xl',$title = $data['newsSlider'][$key][2]->title])
                            <img src="{{ $data['newsSlider'][$key][2]->files[0]->url }}" class='object-cover'/>
                        </div>
                    </div>
                </div>
                <!--end here--> 
            </div>
        @endforeach
        </div>
       
        <div class="swiper-pagination !right-[34%] !bottom-[12%]"></div>
        <div class="autoplay-progress right-[35%]">
            <svg viewBox="0 0 48 48">
                <circle cx="24" cy="24" r="20"></circle>
            </svg>
            <span></span>
            </div>
        
    </div>
</div>
