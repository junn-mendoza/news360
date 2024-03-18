<div class='mb-2 mt-4'>
@if($isHeaderSVG)
    <img src="{{ asset('assets/images/'.$headerSVG) }}" width='300px'/>
@else
@endif
</div>
<section class="variable slider">

<div class='rounded-lg shadow-lg overflow-hidden'>
            <img src="{{ $component->items[0]->files[0]->url }}" class='bg-cover h-full' style="height:600px; ">
        </div>
    <div class='flex flex-col rounded-lg shadow-lg overflow-hidden space-y-[10px]'>
        
        <div class='h-1/2 relative flex-0'>
            <img src="{{ $component->items[1]->files[0]->url }}" class='bg-cover top-1/2' style="width:460px; ">
        </div>

        
        <div class='h-1/2 relative flex-1'>
            <img src="{{ $component->items[2]->files[0]->url }}" sclass='bg-cover top-1/2' style="width:460px; ">
        </div>
        
    </div>
    

    <div class='rounded-lg shadow-lg overflow-hidden'>
        <img src="{{ $component->items[3]->files[0]->url }}" style="height:600px;">
    </div>
</section>