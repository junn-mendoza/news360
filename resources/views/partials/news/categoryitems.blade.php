<div class='flex-col  rounded-xl overflow-hidden shadow-md my-2'>
    <div class='flex '>
        <div class='h-[336px] w-full'>
            @if($component[0]->files)
            <img src="{{ $component[0]->files[0]->url }}" class='object-cover w-full h-full'/>
            @else
                <img src="{{ asset('assets/replace/12352.jpg') }}" class='object-cover w-full h-full'/>
            @endif
        </div>
        
    </div>
    <div class='px-2 '>
        @foreach($component as $item)
        <div class='flex justify-between border border-b-2 border-b-slate-300'>
            <div class='p-2 font-montserrat w-[90%] text-md min-h-[90px] font-bold'>
                <div class='line-clamp-3'>
                    {{ $item->title}}
                </div> 
            </div>
            <div class='w-8 h-8 items-center m-3'>@include('partials.components.link',['color' => $color])</div>
        </div>
        @endforeach
        <div class='flex justify-end mr-3'>
            <div style='background-color:{{ $color }}' class='flex items-center space-x-3 rounded-full  m-1 pb-1 px-3 text-white my-2'>
                <div>read more</div>  
                <div class='w-4 h-4 w'>@include('partials.components.link',['color' => "#FFFFFF"])</div>  
                    
            </div>
        </div>
    </div>
</div>