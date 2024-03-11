<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\DataTransferObjects\ArticleDTO;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            ArticleDTO::fromResource(
                $this,
                CategoryResource::collection($this->whenLoaded('categories')),
                FileResource::collection($this->whenLoaded('files'))

            )
        ];
        

    }
}
