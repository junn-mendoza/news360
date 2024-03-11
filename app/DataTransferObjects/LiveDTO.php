<?php
namespace App\DataTransferObjects;

use Illuminate\Http\Resources\Json\JsonResource;

class LiveDTO
{
    public function __construct (
        public readonly string $title,
        public readonly string $content,
        public readonly string $yt_playlist,
        public readonly bool $streaming
    ){}

    public static function fromResource(JsonResource $resource): self
    {
        return new self(
            title: $resource->title ?? '',
            content: $resource->content ?? '',
            yt_playlist: $resource->yt_playlist ?? '',
            streaming: (bool) $resource->streaming ?? false,
        );
    }   
   
}