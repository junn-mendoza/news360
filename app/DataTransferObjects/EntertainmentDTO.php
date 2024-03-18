<?php
namespace App\DataTransferObjects;

use Illuminate\Http\Resources\Json\JsonResource;

class EntertainmentDTO
{
    
    public function __construct
    (
        public readonly int $id,
        public readonly string $header,
        public readonly string $style,
        public readonly int $order,
        public readonly JsonResource $items,

    ){
    }
    public static function fromResource(JsonResource $resource, $items): self
    {
        return new self(
            id: $resource->id,
            header: $resource->header,
            style: $resource->style,
            order: (int) $resource->order,
            items: $items,
         
        );
    }
}
