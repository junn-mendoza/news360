<?php
namespace App\DataTransferObjects;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerSliderComponentDTO
{
    public function __construct(
        public readonly Object $component,
        public readonly JsonResource $files,
        
    ){}

    public static function fromResource(Object $component, $files): self
    {
        return new self(
            component: $component,
            files: $files
        );
       
    }
}