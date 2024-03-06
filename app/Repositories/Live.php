<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Schedule;
use RepositoryInterface;

class Live extends Base 
{
    public function getDataResource(&$data): void
    {
        $utcTime = Carbon::now('UTC');

        // Convert the UTC time to Asia/Manila timezone
        $manilaTime = $utcTime->setTimezone('Asia/Manila');

        // Get the current day and time in Manila timezone
        $currentDay = $manilaTime->format('l'); // Full textual day representation (e.g., "Monday")
        $currentManilaTime = $manilaTime->format('H:i'); // Current time in "HH:MM" format

        // Prepare the response data
        $responseData = [
            'UTC Date Time' => Carbon::now('UTC')->format('Y-m-d H:i:s'),
            'Timezone' => 'Asia/Manila',
            'Asia/Manila' => $currentManilaTime,
        ];

        $schedules = Schedule::where('day', $currentDay)
            ->with('livestreamLink.filesRelatedMorph.file')
            ->where(function ($query) use ($currentManilaTime) {
                $query->where('start_time', '<=', $currentManilaTime)
                    ->where('end_time', '>=', $currentManilaTime)
                    ->orWhere('start_time', '>', $currentManilaTime);
            })
            ->orderBy('start_time')
            ->limit(3)
            ->get();
        $data['LIVE'] = [
            'Manila Time' => $responseData,
            'Schedules' => $schedules,
        ];
    }
}
