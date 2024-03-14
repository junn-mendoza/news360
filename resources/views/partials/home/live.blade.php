<div class='flex space-x-3 '>
    <div class='w-[60%]'>
        <div class='w-full overflow-hidden rounded-lg shadow-lg border border-1 border-gray-300 relative'>
            @if($data['isLive'])
                @include('partials.components.overlayblack')
                @include('partials.home.liveicon')
           
                
            @endif
            <img src="{{ collect($data['LIVE'][0])->pluck('files')->toArray()[0]->url}}"/>
            
        </div>
        <div class='flex justify-between mt-3'> 
            <div>
                <div class='flex items-center w-auto my-2 rounded-full border border-1 border-gray-400'>
                    <div class='w-5 h-5 rounded-full
                    @if($data['isLive']) bg-red-600
                    @else
                        bg-green-600 
                    @endif
                      mr-1 m-3'></div>
                    <div class=' font-montserrat font-semibold text-md mr-3'>
                    @if($data['isLive'])
                        @if($data['isStreaming'])
                            LIVE NOW
                        @else 
                            TUNE IN TO NET25 TV
                        @endif
                    @else 
                    LIVE STREAMING SOON
                    @endif 
                    </div>
                </div>
            </div>
            <div>
                    @php 
                        $c=0
                    @endphp
                    @foreach( collect($data['LIVE']) as $row)
                        @if($c>2)
                            @include('partials.home.tableupcoming',['item' => $row])
                        @endif
                        @php 
                            $c++
                        @endphp
                    @endforeach
                    
                </table>
            </div>
            
        </div>
    </div>
    <div class='flex flex-col w-[40%] h-full space-y-3'>
        <div class='rounded-lg overflow-hidden shadow-md'>
       
            <img src="{{ collect($data['LIVE'][1])->pluck('files')->toArray()[0]->url}}"/>
        
            
        </div>
        <div class='rounded-lg overflow-hidden shadow-md'>
           
            <img src="{{ collect($data['LIVE'][2])->pluck('files')->toArray()[0]->url}}"/>
        
           
        </div>
    </div>
</div>