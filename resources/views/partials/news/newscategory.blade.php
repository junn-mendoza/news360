<div class='flex justify-evenly space-x-2 my-4'>
    <div class='w-1/3 '>
        <div class='flex flex-col'>
            <div class='shadow-md text-center bg-violet-800 font-fraunces py-2 text-2xl text-white rounded-lg overflow-hidden'>
                Technology
            </div>
            @include('partials.news.categoryitems', ['component' => $data['TECHNOLOGY'] ])
        </div>
    </div>
    
    <div class='w-1/3 '>
        <div class='flex flex-col'>
            <div class='shadow-md text-center bg-rose-700 font-fraunces py-2 text-2xl text-white rounded-lg overflow-hidden'>
                Music
            </div>
            @include('partials.news.categoryitems', ['component' => $data['MUSIC'] ])
        </div>
    </div>

    <div class='w-1/3 '>
        <div class='flex flex-col'>
            <div class='shadow-md text-center  bg-green-700 font-fraunces py-2 text-2xl text-white rounded-lg overflow-hidden'>
                Health
            </div>
            @include('partials.news.categoryitems', ['component' => $data['HEALTH'] ])
        </div>
    </div>
</div>