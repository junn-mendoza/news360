<?php

namespace App\Http\Resources;

use App\DataTransferObjects\BannerSliderComponentDTO;
use Illuminate\Http\Request;
use App\Http\Resources\BannerSliderItemResource;
use App\Models\BannerSliderComponent;
use Illuminate\Http\Resources\Json\JsonResource;

class BannerSliderComponentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //dd(gettype($this->component));
        return [
            BannerSliderComponentDTO::fromResource(
                $this->component,
                FileResource::collection($this->whenLoaded('files'))
            )
        ];
    }
}
