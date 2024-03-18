<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Entertainment;
use App\Http\Resources\EntertainmentResource;
use App\Http\Controllers\Controller;

class ApiEntertainmentController extends Controller
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
       
        return EntertainmentResource::collection($entertainments);
    }
    
}
