<div class='inline-block bg-orange-600 overflow-hidden flex-none rounded-lg relative'>
    @include('partials.components.overlayblack50')
    @include('partials.components.overlaytitle', [$title = $component->title, $size = 'text-xl'])
    @include('partials.components.overlaycategory',
        [
            $color=$component->categories[0]->color,
            $category=$component->categories[0]->name
        ])
    <div class='w-[378px] h-[270px]'>
        <img  class=" object-cover w-full h-full " src="{{ $component->files[0]->url }}" />
    </div>
</div>