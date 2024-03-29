<?php

namespace App\Http\Resources;

use App\DataTransferObjects\SeriesDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  
            SeriesDTO::fromResource(
                $this,
                FileResource::collection($this->whenLoaded('files'))
            )->toArray();
    }
}
