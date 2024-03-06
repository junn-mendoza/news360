<?php

namespace App\Http\Resources;

use App\DataTransferObjects\BannerSliderDTO;
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
            BannerSliderDTO::fromResource(
                $this,
                BannerSliderComponentResource::collection($this->whenLoaded('components') )
            )           
        ];
    }
}
