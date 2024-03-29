<?php
namespace App\DataTransferObjects;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerSliderDTO
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $name,
        public readonly JsonResource $slider,
        
    ){}

    public static function fromResource(JsonResource $resource, $slider): self
    {
        return new self(
            id: $resource->id,
            name: $resource->name,
            slider: $slider            
        );
       
    }

    // Implement toArray method from Arrayable interface
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slider' => $this->slider            
        ];
    }
}