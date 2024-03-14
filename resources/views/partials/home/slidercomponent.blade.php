<div class='shadow-md rounded-lg overflow-hidden border-2 border-gray-300 mb-5'>
@php
    $c=0
@endphp
@foreach($component->files as $file)
    @if($file->mime != 'video/mp4' && $c==0)
        <div class='h-[215px] overflow-hidden '>
            <image src="{{ $file->url}}" class='object-cover' />
        </div>
        @php
            $c++
        @endphp
    @endif
        
@endforeach
        <div class='flex justify-between px-2 py-2 items-center'> 
            <div class='font-montserrat'>{{ $component->title}}</div>
            <div class='w-[70px] h-[40px] items-center pt-3'><img src="{{ asset('assets/images/'.$logo.'.svg') }}"/></div>
        </div>
</div>