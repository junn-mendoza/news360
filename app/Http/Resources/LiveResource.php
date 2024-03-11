<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\DataTransferObjects\LiveDTO;
use Illuminate\Http\Resources\Json\JsonResource;

class LiveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
           LiveDTO::fromResource($this)   
        ];
    }
}
