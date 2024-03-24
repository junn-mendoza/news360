<div class="swiper news-featured relative bg-white">
        <div class="swiper-wrapper">
        @foreach($data['FEATURED'] as $key => $value)
            <div class="swiper-slide">
                <!--start here-->
                <a href='/news/{{ $value->id }}'>
                    <div class='flex flex-col'>
                        <div class='w-full h-[427px] rounded-lg overflow-hidden shadow-md relative'>
                            @include('partials.components.overlayblack')
                            <div style='background-color:{{ $value->categories[0]->color}}' class='absolute font-montserrat text-sm rounded-full text-white py-2 px-3 left-2 top-3'>
                                {{ $value->categories[0]->name }}
                            </div>
                            <img src="{{ $value->files[0]->url }}" class='object-cover w-full h-full'/>
                        </div>
                        <a href='/news/{{ $value->id }}' class='hover:text-gray-400'>
                            <div class=' font-fraunces text-3xl p-3 w-[90%] overflow-hidden'>
                                <div class=' line-clamp-2 '>{{ $value->title}}</div>
                            </div>
                        </a>
                        <div class='p-3'>
                            @include('partials.components.timewithicon', [$dateAndTime = $value->date, $timeString = $value->time_string,])
                        </div>
                    </div>
                </a>
                <!--end here--> 
            </div>
        @endforeach
        </div>
       
        <div class="swiper-pagination !right-[2%] !top-[390px]"></div>
        <div class="autoplay-progress !right-[3%] !top-[350px]">
            <svg viewBox="0 0 48 48">
                <circle cx="24" cy="24" r="20"></circle>
            </svg>
            <span></span>
            </div>
        
    </div>