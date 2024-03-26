<?php
namespace App\Tools\DBHelper;
use App\Models\Series as SeriesModel;
use App\Http\Resources\SeriesResource;
class Series extends Base
{
    public function getDataResource(&$data)
    {
        $series = SeriesModel::with('files')
            ->orderBy('seriess.created_at','desc')
            ->get();
        $data['SERIES']  =  SeriesResource::collection($series);
    }
}