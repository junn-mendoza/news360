<?php

namespace App\Http\Controllers\Entertainment;

use Illuminate\Http\Request;
use App\Models\Entertainment;
use App\Http\Resources\EntertainmentResource;
use App\Http\Controllers\Controller;

class EntertainmentController extends Controller
{
    //
    public function index()
    {
        $entertainments = Entertainment::with(['items','items.files'])
            ->whereHas('items', function ($query) {
                $query->where('component_type', 'sections.entertaintment-item');
            })
            ->orderBy('order', 'ASC')
            ->get();
            
        $data = EntertainmentResource::collection($entertainments);
       
        $entertainment['BANNER'][] = [
            'video' => 'daydreamer.mp4',
            'logo' => 'daydreamer.png',
            'day' => 'Monday - Friday',
            'time' => '7:30 PM'
        ];
        $entertainment['BANNER'][] = [
            'video' => 'unwanted_family.mp4',
            'logo' => 'unwanted_family.png',
            'day' => 'Monday - Friday',
            'time' =>  '8:00 PM'
        ];
        $entertainment['BANNER'][] = [
            'video' => 'house_of_bluebird.mp4',
            'logo' => 'house_of_bluebird.png',
            'day' => 'Monday - Friday',
            'time' => '8:30 PM'
        ];

        $entertainment['BANNER'][] = [
            'video' => 'gracious_revenge.mp4',
            'logo' => 'gracious_revenge.png',
            'day' => 'Monday - Friday',
            'time' => '9:00 PM'
        ];

        return view('entertainment',['data' => $data, 'banners' => $entertainment['BANNER'] ]);
       
    }
    
}
