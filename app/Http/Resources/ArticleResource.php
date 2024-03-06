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
        //  CategoryResource::collection($this->whenLoaded('categories')),
        // FileResource::collection($this->whenLoaded('files'))
        // return [
        //     'id' => $this->id,
        //     'slug' => $this->slug,
        //     'title' => $this->title,
        //     'description' => $this->description,
        //     'media' => $this->media,
        //     'author' => $this->author,
        //     'credit' => $this->credit,
        //     'url' => $this->url,
        //     'content' => $this->content,
        //     'autoplay'  => (bool) $this->autoplay,
        //     'featured'  => (bool) $this->featured,
        //     'special'  => (bool) $this->special,
        //     'date'  => Carbon::parse($this->date),
        //     'created_at' => Carbon::parse($this->created_at),
        //     'updated_at' => Carbon::parse($this->updated_at),
        //     'categories' => CategoryResource::collection($this->whenLoaded('categories')),
        //     'files'  => FileResource::collection($this->whenLoaded('files'))
        // ];
        // return [
        //     'id' => $this->id,
        //     'slug' => $this->slug,
        //     'title' => $this->title,
        //     'description' => $this->description,
        //     'media' => $this->media,
        //     'author' => $this->author,
        //     'credit' => $this->credit,
        //     'url' => $this->url,
        //     'content' => $this->content,
        //     'autoplay'  => (bool) $this->autoplay,
        //     'featured'  => (bool) $this->featured,
        //     'special'  => (bool) $this->special,
        //     'date'  => Carbon::parse($this->date),
        //     'created_at'  => Carbon::parse($this->created_at),
        //     'updated_at'  => Carbon::parse($this->updated_at),
        //     'categories'  => CategoryResource::collection($this->whenLoaded('categories')),
        //     'files'  => FileResource::collection($this->whenLoaded('files'))
        // ];

    }
}
