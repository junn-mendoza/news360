<div class='flex flex-col border-box'>
    <div><img src="{{asset('assets/replace/12352.jpg')}}" class='object-fit'/></div>
    <div class ='px-2 overflow-hidden font-montserrat  py-2  text-sm'>
        <div class='line-clamp-3'>
            The purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn't distract from the layout. A practice not without controversy
        </div>
    </div>
    <div class='border-box flex justify-between font-montserrat text-xs px-2 pt-2 pb-2'>
        <div class='flex space-x-2'>
            <div class=' stroke-slate-100'><img src="{{ asset('assets/ref/time.svg')}}" width=16 height=16/></div>
            @include('partials.home.time', [$dateAndTime = '2023-12-11T07:19:50.000000Z'])
        </div>    
        <div class='border-box pr-2'>
            <div style="background-color:{{ \App\Tools\Helper::getColor('INTERNATIONAL') }}" class='rounded-full text-white px-3 py-1'>
                 INTERNATIONAL
            </div>
        </div>
        
    </div>
</div>