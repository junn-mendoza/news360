<div class='flex-col  rounded-xl overflow-hidden shadow-md my-2'>
    <div class='flex '>
        <div>
            @if($component[0]->files)
            <img src="{{ $component[0]->files[0]->url }}" class='object-fit'/>
            @else
                <img src="{{ asset('assets/replace/12352.jpg') }}" class='object-fit'/>
            @endif
        </div>
        
    </div>
    <div class='px-2 divide-y'>
        @foreach($component as $item)
        <div class='flex justify-between'>
            <div class='p-2 font-montserrat w-[90%]'>
                <div class='line-clamp-3'>
                    {{ $item->title}}
                </div> 
            </div>
            <div class='w-8 h-8 items-center m-3'><img src="{{ asset('assets/images/link.svg') }}"/></div>
        </div>
        @endforeach
        <div class='flex justify-end mr-3'>
            <div class='flex items-center space-x-3 rounded-full bg-orange-500 m-1 px-5 text-white my-2'>
                <div>read more</div>    
                <div class='w-4 h-4'><img src="{{ asset('assets/images/arrow-right.svg') }}" class=' stroke-white'/></div>    
            </div>
        </div>
    </div>
</div>