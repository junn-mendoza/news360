<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entertainment;
use App\Http\Resources\EntertainmentResource;

class EntertainmentController extends Controller
{
    //
    public function index()
    {
        $entertainments = Entertainment::with(['items','items.files'])
            ->whereHas('items', function ($query) {
                $query->where('component_type', 'sections.entertaintment-item');
            })
            ->get();
        // /$entertainments = Entertainment::with('components')->get();
         //return response()->json($entertainments, 200);
        //dd($entertainments);
        return EntertainmentResource::collection($entertainments);

        //return view('entertainment');
    }
}
