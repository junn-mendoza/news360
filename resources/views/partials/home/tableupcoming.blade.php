<div class='bg-white flex border border-1 border-gray-300 rounded-full overflow-hidden mt-2 mb-1 shadow-md'>
    <div class=' my-2 '> 
        <div class=' font-montserrat text-xs text-white rounded-full mx-5 py-0 px-5 bg-rose-600'>
            UPCOMING
        </div>
    </div>
    <div class=' font-montserrat mt-1 mr-3'>{{ $row->start_time }}</div>
    <div  class=' font-montserrat mt-1 mr-3'>{{ $row->end_time }}</div>
    <div  class=' font-montserrat mt-1 mr-3'>{{ $row->day }}</div>
    
    <div  class=' font-montserrat mt-1 mr-10 font-semibold'>{{ $row->title }}</div>
</div>