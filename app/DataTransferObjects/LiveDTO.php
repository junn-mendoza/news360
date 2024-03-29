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
        if ($resource !== null) {
            $isStreaming = $resource->streaming ?? false;
        } else {
            // Handle the case where $resource is null
            $isStreaming = false;
        }
        return new self(
            title: $resource->title ?? '',
            content: $resource->content ?? '',
            yt_playlist: $resource->yt_playlist ?? '',
            streaming: $isStreaming,
        );
    }  
    
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'yt_playlist' => $this->yt_playlist,
            'streaming' => $this->streaming,
        ];
    }
   
}