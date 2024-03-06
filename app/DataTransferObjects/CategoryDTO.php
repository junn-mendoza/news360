<?php
namespace App\DataTransferObjects;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryDTO
{
    public function __construct
    (
        public readonly int $id,
        public readonly string $name,
        public readonly string $slug,
        public readonly bool $showmenu,
        public readonly Carbon $created_at,
        public readonly Carbon $updated_at,
    ){

    }
    public static function fromResource(JsonResource $resource): self
    {
        return new self(
            id: $resource->id,
            name: $resource->name,
            slug: $resource->slug,
            showmenu: (bool) $resource->showmenu,
            created_at: Carbon::parse($resource->created_at),
            updated_at: Carbon::parse($resource->updated_at),
        );
    }
}