<?php
namespace App\Tools\DBHelper;
use App\Models\Program ;
use App\Http\Resources\ProgramResource;

class Programs extends Base
{
    public function getDataResource(&$data)
    {
        $programs = Program::with('files')
            ->where('enabled',1)
            ->orderBy('programs.created_at','desc')
            ->get();
        $data['PROGRAMS']  = ProgramResource::collection($programs);
    }
}