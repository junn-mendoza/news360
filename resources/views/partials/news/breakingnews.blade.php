<div class='flex mt-2 rounded-full shadow-md parent-wrapper overflow-hidden'>
    <div class='bntitle text-white z-[99] font-montserrat py-3 pl-6 pr-3 whitespace-nowrap'>BREAKING NEWS</div>
    <div class=' relative bncontainer'>
        <ul>
            @foreach($data['BREAKING_NEWS'] as $bn)
            <li class='text-red-700 font-semibold mt-1 whitespace-nowrap relative font-montserrat text-sm'>{{ $bn->title }}</li>
            @endforeach
        </ul>
    </div>

</div>
