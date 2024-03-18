<div class='bg-white flex flex-col p-2 rounded-2xl overflow-hidden drop-shadow-md'>
    <div class='font-montserrat border-b-2 pb-2 text-xl font-semibold topnewsHeader pl-3'>TOP NEWS</div>
    <!--start-->
    <div id='topnews' class="flex h-[833px] flex-col divide-y divide-gray-300 divide-solid overflow-y-scroll scrollbar-thumb-rounded-full scrollbar-track-rounded-full scrollbar scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
            @foreach($data['TOPNEWS'] as $topnews)
            <div class='flex py-3'>
                <div class='w-2/3 flex flex-col justify-between'>
                    <div class=' line-clamp-3 font-fraunces text-lg text-gray-600 font-bold px-2 h-full mr-2'>{{ $topnews->title }}</div>
                    <!--<div class=' line-clamp-2 space-x-3 text-gray-500 font-montserrat text-sm pt-2 mb-3'>
                        {!! $topnews->description !!}
                    </div>-->
                    <div class='flex justify-between space-x-2 font-montserrat text-xs px-2 pt-2'>
                        <div class='flex space-x-2'>
                            <div class=' stroke-slate-100'><img src="{{ asset('assets/ref/time.svg')}}" width=16 height=16/></div>
                            @include('partials.components.time', [$dateAndTime = $topnews->date, $timeString = $topnews->time_string])
                        </div>    
                        <div class='pr-2'>
                            <!--{{ $topnews->categories[0] }}-->
                            <div style="background-color:{{ \App\Tools\Helper::getColor($topnews->categories[0]->name) }};" class='rounded-full text-white px-3 py-1'>
                                {{ $topnews->categories[0]->name }}
                            </div>
                        </div>
                        
                    </div>
                    <div></div>
                </div>
                <div class=' w-1/3 rounded-md overflow-hidden'>
                    <img src="{{ $topnews->files[0]->url}}" class='h-full w-full object-cover'/>
                </div>
            </div>
            @endforeach
            
        
        <div class="swiper-scrollbar"></div>
    </div>
    <!--end-->
</div>