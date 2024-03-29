<?php

namespace App\Http\Controllers\Api;


use App\Models\Entertainment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\EntertainmentResource;

class EntertainmentController extends Controller
{
    //
    public function index()
    {
        if (Cache::has('ENTERTAINMENT')) {
            $data = Cache::get('HOMEPAGE');
        } else {
            $entertainments = Entertainment::with(['items','items.files'])
            ->whereHas('items', function ($query) {
                $query->where('component_type', 'sections.entertaintment-item');
            })
            ->orderBy('order', 'ASC')
            ->get();
            $tmp = [
                
                [
                        'video' => 'daydreamer.mp4',
                        'logo' => 'daydreamer.png',
                        'day' => 'Monday - Friday',
                        'time' => '7:30 PM'
                ],
                [
                    'video' => 'daydreamer.mp4',
                    'logo' => 'daydreamer.png',
                    'day' => 'Monday - Friday',
                    'time' => '7:30 PM'
                ],
                [
                    'video' => 'gracious_revenge.mp4',
                    'logo' => 'gracious_revenge.png',
                    'day' => 'Monday - Friday',
                    'time' => '9:00 PM'
                ]
            ];
            $newTmp = EntertainmentResource::collection($entertainments);
            $data['SLIDERS'] = $newTmp;
            $data['BANNERS'] = $tmp;
            Cache::add('ENTERTAINMENT',$data, 15 );
        }        
       return $data;
    }
    
}
