@extends('layout.layout')


@section('content')

    @include('partials.news.newsmenu')
    @include('partials.components.breadcrumbs',
        [   
            'title' => $data['DETAIL'][0]->title,
            'id'=>$data['DETAIL'][0]->id,
            
        ])
    <div class='flex container space-x-3 mx-auto'>
        <!--start left-->
        <div class='w-3/4 border border-slate-600 my-4 p-4 pl-10 rounded-lg shadow-lg bg-white '>
            <div class='flex flex-col'>
                <div class=' font-fraunces text-5xl mt-4'>{{ $data['DETAIL'][0]->title }}</div>
                <div class='flex justify-between bg-gray-300 font-montserrat my-3 rounded-full p-2 mr-5'>
                    <div class='pl-3'>By: {{ $data['DETAIL'][0]->credit }}</div>
                    <div class='mr-5'>Publish: {{ $data['DETAIL'][0]->date }}</div>
                </div>
                <div class='w-[108%] h-full relative '>
                    
                    <img src="{{ asset('assets/images/watermark.png')}}" class='absolute w-[300px] z-[99999] bottom-10 right-[120px]'/>
                    @include('partials.components.overlayblackcustom')
                    <img src="{{ $data['DETAIL'][0]->files[0]->url }}" class="overflow-hidden rounded-lg shadow-2xl object-cover w-[108%] h-full -ml-[100px] my-3"/>
                   
                </div>
                <div class='w-[95%] font-montserrat text-xl mt-10'>
                    {!! $content !!}
                </div>
                <div class='flex mt-10 space-x-4 bg-slate-100 px-4 py-6 rounded-xl overflow-hidden'>
                    <div class='w-1/2'>
                        @include('partials.components.topnews',
                        [
                            'withScroll' => false,
                            'components' => $data['OTHER_NEWS']->splice(0,5), 
                            'withHeader' => false,
                                                        
                        ]) </div>
                    <div class='w-1/2 h-full'>
                        @include('partials.components.topnews',
                        [
                            'withScroll' => false,
                            'components' => $data['OTHER_NEWS'], 
                            'withHeader' => false,
                                                        
                        ])
                    </div>
                </div>
            </div>
        </div>
        <!--start right-->
        <div class='w-1/4 border border-slate-600 my-4 p-4 rounded-lg shadow-lg bg-white'>
            <div>
                <div class=' font-montserrat font-semibold border-b-2 border-red-700 pb-2'>Entertainment</div>
                
                @foreach($data['newsSlider']['ENTERTAINMENT'] as $component)
                <div class=' font-fraunces text-2xl my-3 hover:text-gray-500'>
                   <a href='/news/{{ $component->id}}'> {{ $component->title}}</a>
                </div>
                @if($loop->last)
                    {{-- Display something for the last iteration --}}
                    <div class=' overflow-hidden rounded-lg'>
                        <img src="{{ $component->files[0]->url }}" class=' w-full h-full shadow-lg'/>
                    </div>
                @endif
                @endforeach
            </div>
            <div class='mt-7'>
                <div class=' font-montserrat font-semibold border-b-2 border-red-700 pb-2'>Sports</div>
                
                @foreach($data['newsSlider']['SPORTS'] as $component)
                <div class=' font-fraunces text-2xl my-3 hover:text-gray-500'>
                   <a href='/news/{{ $component->id}}'> {{ $component->title}}</a>
                </div>
                @if($loop->last)
                    {{-- Display something for the last iteration --}}
                    <div class=' overflow-hidden rounded-lg'>
                        <img src="{{ $component->files[0]->url }}" class=' w-full h-full shadow-lg'/>
                    </div>
                @endif
                @endforeach
            </div>
            <div class='mt-7'>
                <div class=' font-montserrat font-semibold border-b-2 border-red-700 pb-2'>Technology</div>
                
                @foreach($data['newsSlider']['TECHNOLOGY'] as $component)
                <div class=' font-fraunces text-2xl my-3 hover:text-gray-500'>
                   <a href='/news/{{ $component->id}}'> {{ $component->title}}</a>
                </div>
                @if($loop->last)
                    {{-- Display something for the last iteration --}}
                    <div class=' overflow-hidden rounded-lg'>
                        <img src="{{ $component->files[0]->url }}" class=' w-full h-full shadow-lg'/>
                    </div>
                @endif
                @endforeach
            </div>
        </div>

                         
    
    </div>
    <div class='container mx-auto'>
    <div class=' font-fraunces text-3xl mt-5 mb-2'>News you might have missed</div>
        @foreach ($data['MISSED']->chunk(4) as $row)  
            <div class='flex w-full space-x-2'>
                @foreach($row as $missed)
                <div class='w-1/4 bg-slate-100 mb-2'>
                    @include('partials.news.newsmissed',['component' => $missed])
                </div>
                @endforeach
                
            </div>
            @endforeach   
    </div>
@endsection
@pushOnce('css')
    <style>
        .detail-image img{
            width: 100%;
            background-size: cover;
        }
    </style>
@endpushOnce
@pushOnce('js')
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/news.js') }}"></script>
<script src="{{ asset('assets/js/swiper.js') }}"></script>

<script>
    const progressCircle = document.querySelector(".autoplay-progress svg");
    const progressContent = document.querySelector(".autoplay-progress span");
    let newsFeaturedEl = NewsFeaturedSwiper('.news-featured', 1);
    let newsEntertainmentEl = CustomSwiper('.news-entertainment', 4);
    let newsSportEl = CustomSwiper('.news-sport', 4);
    let newsInternationalEl = CustomSwiper('.news-international', 4);
   
</script>
@endpushOnce