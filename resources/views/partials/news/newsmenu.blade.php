<div class=' bg-[#202d5f] border-t-4 border-white'>
        <div class='container mx-auto'>
            <div class='flex flex-col py-5'>
                <div class=' text-[#f3e250] font-fraunces text-4xl mb-1'>News Update</div>
                <div class='flex divide-x divide-dotted diver-white -ml-4 space-x-4'>
                    @foreach($data['CATEGORY'] as $category)
                    <div class=' font-montserrat text-white text-sm pl-4'>{{ $category->name}}</div>
                    @endforeach
                </div>
            </div>
            
        </div>
        
    </div>