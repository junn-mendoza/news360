<div class='flex justify-evenly space-x-2 my-4'>
    @foreach($data['CATEGORY_BLOCK'] as $key => $value)
       
        <div class='w-1/3 '>
            <div class='flex flex-col'>
                <div style="background-color: {{ $value->color}}" class='shadow-md text-center font-fraunces py-2 text-2xl text-white rounded-lg overflow-hidden'>
                    {{ $value->title }}
                </div>
                @include('partials.news.categoryitems', ['component' => $value->data, 'color'=>$value->color] )
            </div>
        </div>
       
    @endforeach
</div>
