<?php

namespace App\DataTransferObjects;

use Illuminate\Http\Resources\Json\JsonResource;
class ProgramDTO
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $title,
        public readonly ?string $description,
        public readonly ?string $slug,
        public readonly ?string $director,
        public readonly ?string $producer,
        public readonly ?string $ratings,
        public readonly ?string $timeslot,
        public readonly ?string $url,
        public readonly ?string $location,
        public readonly ?string $genre,
        public readonly ?string $name,
        public readonly ?string $character,
        public readonly ?string $playlist,
        public readonly bool $enabled,
        public readonly JsonResource $files// Change this to Collection to handle multiple files
    ) {
    }

    public static function fromResource(JsonResource $resource, $files): self
    {
        return new self(
            id: $resource->id,
            title: $resource->title,
            description: $resource->description,
            slug: $resource->slug,
            director: $resource->director,
            producer: $resource->producer,
            ratings: $resource->ratings,
            timeslot: $resource->timeslot,
            url: $resource->url,
            location: $resource->location,
            genre: $resource->genre,
            name: $resource->name,
            character: $resource->character,
            playlist: $resource->playlist,
            enabled: (bool) $resource->enabled,
            files: $files
        );
    }
}
