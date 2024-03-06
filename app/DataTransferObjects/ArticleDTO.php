<?php

namespace App\DataTransferObjects;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleDTO
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $slug,
        public readonly ?string $title,
        public readonly ?string $description,
        public readonly ?string $media,
        public readonly ?string $author,
        public readonly ?string $credit,
        public readonly ?string $url,
        public readonly ?string $content,
        public readonly ?bool $autoplay,
        public readonly ?bool $featured,
        public readonly ?bool $special,
        public readonly ?Carbon $date,
        public readonly ?Carbon $created_at,
        public readonly ?Carbon $updated_at,
        public readonly JsonResource $categories,
        public readonly JsonResource $files// Change this to Collection to handle multiple files
    ) {
    }

    public static function fromResource(JsonResource $resource, $categories, $files): self
    {
        return new self(
            id: $resource->id,
            slug: $resource->slug,
            title: $resource->title,
            description: $resource->description,
            media: $resource->media,
            author: $resource->author,
            credit: $resource->credit,
            url: $resource->url,
            content: $resource->content,
            autoplay: (bool) $resource->autoplay,
            featured: (bool) $resource->featured,
            special: (bool) $resource->special,
            date: Carbon::parse($resource->date),
            created_at: Carbon::parse($resource->created_at),
            updated_at: Carbon::parse($resource->updated_at),
            categories: $categories,
            files: $files
        );
    }
}
