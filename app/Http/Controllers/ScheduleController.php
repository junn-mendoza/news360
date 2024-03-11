<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScheduleResource;
use App\Services\LiveService;

class ScheduleController extends Controller
{
    protected $liveService;
    public function __construct(LiveService $liveService)
    {
        $this->liveService = $liveService;
    }
    public function index()
    {
        
        return ScheduleResource::collection($this->liveService->getLiveProgram());
        
        //return response()->json(['Manila Time'=>$responseData,'Schedules'=>$schedules]);
    }
}
