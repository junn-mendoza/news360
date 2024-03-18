<div class='mb-2 mt-4'>
@if($isHeaderSVG)
    <img src="{{ asset('assets/images/'.$headerSVG) }}" width='300px'/>
@else
@endif
</div>
<div class="columns-1 sm:-columns-2 lg:columns-3 gap-3 space-y-3">
    @foreach($component->items as $item)
    <div class="mansonry-box group  text-white bg-orange-400 h-full relative overflow-hidden shadow-lg rounded-lg">
       
                <img class="h-auto max-w-full rounded-lg" src="{{ $item->files[0]->url }}" alt="">
        
    </div>
    @endforeach
</div>