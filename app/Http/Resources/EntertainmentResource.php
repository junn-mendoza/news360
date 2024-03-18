<?php

namespace App\Http\Resources;

use App\DataTransferObjects\EntertainmentDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EntertainmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            EntertainmentDTO::fromResource(
                $this, 
                ComponentsSectionsEntertainmentItemResource::collection($this->whenLoaded('items')),
                //FileResource::collection($this->whenLoaded('items.files'))
            )
            //'section' => new ComponentSectionEntertainmentItemResource($this->section),
        ];
    }
}
