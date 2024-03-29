<?php

namespace App\Http\Resources;

use App\DataTransferObjects\ProgramDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return ProgramDTO::fromResource(
            $this,
            FileResource::collection($this->whenLoaded('files'))
        )->toArray();
    }
}
