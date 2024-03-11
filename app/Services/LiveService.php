<?php
namespace App\Services;

use Carbon\Carbon;
use App\Models\Schedule;
use Illuminate\Support\Collection;

class LiveService
{
    protected $isLive = false;
    public function getLiveProgram()
    {
        // Create a new Carbon instance for UTC timezone
        $utcTime = Carbon::now('UTC');

        // Convert the UTC time to Asia/Manila timezone
        $manilaTime = $utcTime->setTimezone('Asia/Manila');

        // Get the current day and time in Manila timezone
        $currentDay = $manilaTime->format('l'); // Full textual day representation (e.g., "Monday")
        // Get the next day from the current day
        $nextDay = $manilaTime->addDay()->format('l');
        $currentManilaTime = $manilaTime->format('H:i'); //

        
        $countLive = 5;
        $schedules = Schedule::where('day',$currentDay)
            ->with(['livestreamLink.filesRelatedMorph.file', 'livestreamLink.live' => function ($query) {
                // Apply the scopeStreaming scope to the live relationship
                $query->streaming();
            }])
            ->where(function ($query) use ($currentManilaTime) {
                $query->where('start_time', '<=', $currentManilaTime)
                    ->where('end_time', '>=', $currentManilaTime);
            })
            ->whereHas('liveStreamLink')
            ->orderBy('start_time')           
            ->limit(1)
            ->get();
    $this->isLive = ($schedules->count()>0 ? true: false);
           
    $live_id = $schedules->count()>0 ? $schedules[0]->id : null;
  
    $schedulesMore = Schedule::where('day',$currentDay)
        ->when($live_id !== null, function ($query) use ($live_id) {
            $query->where('id', '<>', $live_id);
        })
        ->with(['livestreamLink.filesRelatedMorph.file', 'livestreamLink.live' => function ($query) {
            // Apply the scopeStreaming scope to the live relationship
            $query->streaming();
        }])
        ->where(function ($query) use ($currentManilaTime) {
            $query->where('start_time', '<=', $currentManilaTime)
                ->where('end_time', '>=', $currentManilaTime)
                ->orWhere('start_time', '>', $currentManilaTime);
        })
        ->whereHas('liveStreamLink')
        ->orderBy('start_time')           
        ->limit($countLive-($schedules->count()))
        ->get();
    
    $schedules = $schedules->concat($schedulesMore);
   
    //dd($schedulesMore->count());
  //dd($nextDay);
    //     $allSchedule = $schedules->concat($scheduleMore ?? new Collection());
    //     $next = null; 
        if($schedules->count() < $countLive) {
           // dd($countLive - $schedules->count());
            $next = Schedule::where('day',$nextDay)
                // ->with([
                //     'livestreamLink.filesRelatedMorph.file', 
                //     'livestreamLink.live' ])
            ->with(['livestreamLink.filesRelatedMorph.file', 'livestreamLink.live' => function ($query) {
                // Apply the scopeStreaming scope to the live relationship
               $query->streaming();
           }])
            ->where(function ($query) use ($currentManilaTime) {
                $query->where('start_time', '<=', $currentManilaTime);
                    //->where('end_time', '>=', $currentManilaTime)
                    //->orWhere('start_time', '>', $currentManilaTime);
            })
            ->whereHas('liveStreamLink')
            ->orderBy('start_time')           
            ->limit($countLive - $schedules->count() )
            ->get();

            $schedules = $schedules->concat($next);
            
        }
        
        
       // dd($schedules);
        return $schedules;
    }

    public function isLive() {
        return $this->isLive;
    }
}
