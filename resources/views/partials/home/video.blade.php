<div class='relative overflow-hidden rounded-2xl drop-shadow-md'>

    <div class="swiper home-banner">
        <!-- Additional required wrapper -->
        
        <div class="swiper-wrapper">
            @php
            $c=0
            @endphp
            @foreach($data['BANNER'] as $banner)
            <!-- Slides -->
            <div class="swiper-slide">
                <div class='overlay-video absolute h-full w-full right-0 top-0 bottom-0 left-0 z-20'></div>
                <div class='overlay-text flex h-1/4 items-center absolute z-50 bottom-2 left-5 my-5'>
                    <div class=' pr-5 border-r border-gray-300 w-[400px] relative'>
                        <img class='banner-logo object-cover' src="{{ asset('assets/images/' . $banner['logo']) }}"" />
                    </div>
                    <div class='h-1/4 flex flex-col'>
                        <div class=' ml-5 space-y-3'>
                            <div class=' text-white font-montserrat font-semibold text-4xl'>{{ $banner['day'] }}</div>
                            <div class=' text-white font-montserrat font-light text-xl'>{{ $banner['time'] }}</div>
                        </div>
                    </div>
                </div>
                <video id='v{{$c}}' class='object-cover z-50' src=" {{ asset('assets/video/' . $banner['video']) }}" width='100%' muted class=' bg-cover'></video>
            </div>
            @php
            $c++
            @endphp
            @endforeach

            
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
        <div class='sound' id="muteToggle" onclick="toggleMute()">
            
            <!-- SVG icons will be inserted here dynamically -->
        </div>
    
    </div>




        </div>