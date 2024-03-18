<div class='flex space-x-2'>
    <div class=' stroke-slate-100'><img src="{{ asset('assets/ref/time.svg')}}" width=16 height=16/></div>
    @include('partials.components.time', ['dateAndTime' => $dateAndTime, 'timeString' => $timeString ])
</div> 