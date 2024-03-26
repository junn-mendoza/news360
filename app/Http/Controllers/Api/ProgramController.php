<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProgramResource;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{
    public function index()
    {
       
        $programs = Program::with('files')
            ->where('enabled',1)
            ->orderBy('programs.created_at','desc')
            ->get();
        
        // Retrieve the article
        
        
        // Return the article resource
        return ProgramResource::collection($programs);
    }
}
