<?php

namespace App\Http\Resources;

use App\DataTransferObjects\FileDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return FileDTO::fromResource($this)->toArray();
    }
}
