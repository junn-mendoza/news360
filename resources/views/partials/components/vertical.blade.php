<div class='mb-2 mt-4'>
@if($isHeaderSVG)
    <img src="{{ asset('assets/images/'.$headerSVG) }}" width='300px'/>
@else
@endif
</div>
<section class="variable slider">
    @foreach($component->items as $item)
    <div class='rounded-lg shadow-lg overflow-hidden'>
        <img src="{{ $item->files[0]->url }}" style="height:600px">
    </div>
    @endforeach
</section>