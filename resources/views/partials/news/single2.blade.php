<div class='flex flex-col border-box bg-white'>
    <div class='h-[212px] overflow-hidden flex-none w-full '>
        <img src="{{ $component->files[0]->url }}" class='object-cover w-full h-full'/>
    </div>
    <div class ='px-2 overflow-hidden font-fraunces text-xl  py-2  h-[70px] '>
        <div class='line-clamp-3'>
            {{ $component->title}}
        </div>
    </div>
    <div class='border-box flex justify-between font-montserrat text-xs px-2 pt-2 pb-2'>
        @include('partials.components.timewithicon', [$dateAndTime = $component->date, $timeString = $component->time_string])
          
        <div class='border-box pr-2'>
            <div style='background-color:{{ $component->categories[0]->color }}' class='rounded-full text-white px-3 py-1 '>
                 {{ $component->categories[0]->name}}
            </div>
        </div>
        
    </div>
</div>