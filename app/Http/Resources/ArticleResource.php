<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
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
        // Convert the resource into an ArticleDTO object
        $articleDTO = ArticleDTO::fromResource($this);
        
        // Return an array representation of the ArticleDTO object
        return [
            $articleDTO
        ];
       
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
        //     'autoplay' => (bool) $this->autoplay,
        //     'featured' => (bool) $this->featured,
        //     'special' => (bool) $this->special,
        //     'date' => $this->date,
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
        //     'categories' => CategoryResource::collection($this->whenloaded('categories')),
        //     'files' => FileResource::collection($this->whenLoaded('files')),

        // ];
    }
}
