<?php

namespace App\Http\Resources;

use App\Tools\Helper;
use Illuminate\Http\Request;
use App\DataTransferObjects\CategoryDTO;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            CategoryDTO::fromResource($this)
        ];
    }
    
}
