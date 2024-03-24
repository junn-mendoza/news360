@extends('layout.layout')


@section('content')
   
    @include('partials.news.newsmenu')

    <div class='container mx-auto'>
        <!--new wrapper-->
        @include('partials.news.breakingnews')
        <!--first layer-->
        <div class='flex w-full space-x-2 my-2'>
            <div class='w-2/4 bg-gray-100 overflow-hidden shadow-md rounded-md'>
                <!--news featured swiper-->
                @include('partials.news.newsfeatured')

                <div class='flex divide-x bg-gray-100 '>
                    @include('partials.news.newsbits', ['tidbits' => $data['TIDBITS'][0] ])
                    @include('partials.news.newsbits', ['tidbits' => $data['TIDBITS'][1] ])
                </div>

                <!--news featured swiper-->
            </div>
            <div class='flex flex-col space-y-2 w-1/4  '>
                <div class='overflow-hidden rounded-md shadow-md'>
                    @include('partials.news.single2', ['component' => $data['MOREARTICLES_1'][0]])
                </div>
                <div class='overflow-hidden rounded-md shadow-md'>
                    @include('partials.news.single2', ['component' => $data['MOREARTICLES_1'][1]])
                </div>
            </div>
            <div class='flex flex-col space-y-2 w-1/4  '>
                <div class='overflow-hidden rounded-md shadow-md'>
                    @include('partials.news.single2', ['component' => $data['MOREARTICLES_1'][2]])
                </div>
                <div class='overflow-hidden rounded-md shadow-md'>
                    @include('partials.news.single2', ['component' => $data['MOREARTICLES_1'][3]])
                </div>
            </div>
        </div>
        <!--first layer-->
        <!--second layer-->
        @include('partials.news.row')

        @include('partials.news.newscategory')
        <!--second layer-->
        @include('partials.news.slidernews', 
            [
                'title' => 'Entertainment',
                'key' => 'ENTERTAINMENT',
                'class' => 'news-entertainment',
            ])

        @include('partials.news.slidernews', 
            [
                'title' => 'Sports',
                'key' => 'SPORTS',
                'class' => 'news-sport',
            ])

        @include('partials.news.slidernews', 
            [
                'title' => 'International',
                'key' => 'INTERNATIONAL',
                'class' => 'news-international',
            ])
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
    <!--end new wrapper-->
</div>
@endsection

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