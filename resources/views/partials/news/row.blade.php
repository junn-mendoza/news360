<!--first layer-->


    @foreach ($data['MOREARTICLES_2']->chunk(4) as $row)
        <div class='flex space-x-2 w-full border-box '>
            @foreach ($row as $item)
                <div class='overflow-hidden rounded-md shadow-md w-1/4 mb-2'>
                    <!-- Display your item here -->
                    @include('partials.news.single2', ['component' => $item])
                </div>
            @endforeach
        </div>
    @endforeach

<!--first layer-->