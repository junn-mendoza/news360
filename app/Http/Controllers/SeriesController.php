<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Resources\SeriesResource;

class SeriesController extends Controller
{
    public function index()
    {
       
        $series = Series::with('files')
            ->orderBy('seriess.created_at','desc')
            ->get();
        
        // Retrieve the article
        
        
        // Return the article resource
        return SeriesResource::collection($series);
    }
}
