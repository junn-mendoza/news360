<?php

namespace App\Http\Resources;

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
        //dd($request->files);
        return [
            'Detail' => $this->component,
            'Files' => FileResource::collection($this->whenLoaded('files')),
        ];
    }
}
