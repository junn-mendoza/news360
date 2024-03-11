<?php
namespace App\DataTransferObjects;

use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $day,
        public readonly ?string $start_time,
        public readonly ?string $end_time,
        public readonly ?string $slug,
        public readonly ?JsonResource $files,
        public readonly ?JsonResource $live,
    ){}

    public static function fromResource(JsonResource $resource, $files = null, $live = null): self
    {
        return new self(
            id: $resource->id,
            day: $resource->day,
            start_time: $resource->start_time,
            end_time: $resource->end_time,
            slug: $resource->slug,
            files: $files ?? [],
            live: $live ?? [],
        );
       
    }
}