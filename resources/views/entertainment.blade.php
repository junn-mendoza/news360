@extends('layout.layout')


@section('content')
<div class='flex space-x-3 px-3 max-w-[2000px] mx-auto'>
    <div class='w-full'>
        @include('partials.home.video')
    </div>
       
</div>
<div class='container mx-auto mb-4'>
@foreach($data as $item)
    @switch($item->style) 
        @case('vertical')
            @include('partials.components.vertical', ['component' => $item,
                'isHeaderSVG'=>true, 
                'headerSVG' => 'hot.svg'])
            @break
        @case('center')
            @include('partials.components.center', ['component' => $item,
                'isHeaderSVG'=>true, 
                'headerSVG' => 'entertainment-featured.svg'])
            @break
        @case('left')
            @include('partials.components.left', ['component' => $item,
                'isHeaderSVG'=>true, 
                'headerSVG' => 'entertainment-exclusive.svg'])
            @break
        @case('mansonry')
            @include('partials.components.mansonry', ['component' => $item,
                'isHeaderSVG'=>true, 
                'headerSVG' => 'entertainment-programs.svg'])
            @break
        @default 
            @include('partials.components.default', ['component' => $item,
                'isHeaderSVG'=>true, 
                'headerSVG' => 'entertainment-update.svg'])
           

    @endswitch
   

@endforeach
</div>

@endsection
@pushOnce('css')
    <link href="{{ asset('assets/css/slick-theme.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/slick.css') }}" rel="stylesheet"/>

    <style type="text/css">
    .slick-slide {
      margin: 0px 5px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: 1;
    }
    
    .slick-active {
      opacity: .8;
    }

    .slick-current {
      opacity: 1;
    }
  </style> 
@endpushOnce
@pushOnce('js')
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="{{ asset('assets/js/slick.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/home.js') }}"></script>
<script src="{{ asset('assets/js/swiper.js') }}"></script>

<script type="text/javascript">
    const progressCircle = document.querySelector(".autoplay-progress svg");
    const progressContent = document.querySelector(".autoplay-progress span");


    $(document).on('ready', function() {
      
      $(".variable").slick({
        dots: true,
        infinite: true,
        variableWidth: true
      });
      
    });
</script>

@endpushOnce