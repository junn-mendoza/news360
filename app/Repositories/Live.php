<?php

namespace App\Repositories;

use App\Http\Resources\ScheduleResource;
use App\Services\LiveService;

class Live extends Base 
{
     
    public function getDataResource(LiveService $liveProgramProvider,&$data): void
    {        
        $data['LIVE'] = ScheduleResource::collection(
            $liveProgramProvider->getLiveProgram(),
        );
        
        $data['isLive'] = $liveProgramProvider->isLive();
    }
}
