<div class='bg-gray-100 w-1/2'>
    <div class='flex my-2 mx-2'>
        <div class='w-16 h-16 inline-block bg-orange-600 mr-4 overflow-hidden flex-none rounded-full'>
            <img  class=" object-cover w-full h-full " src="{{ $tidbits->files[0]->url }}" />
        </div>
        <div class ='flex flex-col overflow-hidden font-montserrat text-sm'>
            <div class='line-clamp-3 flex-1'>
                {{ $tidbits->title }}
            </div>
            <div class='mt-1 '>
                <a class=' font-montserrat text-xs' href='' >
                    <div class='flex space-x-2 px-5 py-1 rounded-full '>
                        <div class=' inline-block items-center'>read more...</div>
                        <div class='w-4 h-4 inline-block '><img src=" {{ asset('assets/images/link.svg')}}"/></div>
                    </div>
                </a>
            </div>
        </div>
    </div>    
</div>