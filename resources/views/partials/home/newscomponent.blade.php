<div class='box-border hover:box-content shadow-md hover:shadow-lg rounded-lg overflow-hidden border-2 border-gray-300 mb-5 hover:border-white'>
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
    <div class='flex flex-col px-2 py-2 items-center'>
        <div class='font-montserrat line-clamp-2 min-h-14'>{{ $component->title}}</div>
        <div class='flex w-full items-center justify-between'>
            
            @include('partials.components.timewithicon', [$dateAndTime = $component->date, $timeString = $component->TimeString])
            

            <div class='flex-0 w-[70px] h-[40px] items-center pt-3'>
                <img src="{{ asset('assets/images/update.svg') }}"  />
            </div>
        </div>
    </div>
</div>