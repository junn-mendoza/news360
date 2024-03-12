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
        <div class='flex w-full items-center'>
            <div class='flex space-x-2 w-full'>
                <div class=' stroke-slate-100'><img src="{{ asset('assets/ref/time.svg')}}" width=16 height=16 /></div>
                <div class='font-montserrat text-xs '>5 minutes ago</div>
            </div>

            <div class='flex-0 w-[70px] h-[40px] items-center pt-3'>
                <img src="{{ asset('assets/images/logo.svg') }}"  />
            </div>
        </div>
    </div>
</div>