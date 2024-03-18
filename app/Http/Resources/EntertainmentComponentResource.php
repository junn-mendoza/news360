<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EntertainmentComponentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            $this,
            [],
            FileResource::collection($this->whenLoaded('files'))
            // Add other fields as needed
           // 
           //'section' => new ComponentSectionEntertainmentItemResource($this->section),
        ];
    }
}
