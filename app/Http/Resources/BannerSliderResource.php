<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\BannerResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BannerSliderComponentResource;

class BannerSliderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'Slider' => BannerSliderComponentResource::collection($this->whenLoaded('components') ),
            // 'Sliders' => 
            // [
            //     BannerSliderComponentResource::collection($this->whenLoaded('components') ),
            // ]
            //'files' => FileResource::collection($this->components->pluck('file')->flatten()),
        ];
    }
}
