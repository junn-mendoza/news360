<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\LiveResource;
use App\Http\Resources\EmptyResource;
use App\DataTransferObjects\ScheduleDTO;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       
        return [
            ScheduleDTO::fromResource(
                $this,                
                FileResource::make($this->livestreamLink->filesRelatedMorph->file),
                LiveResource::make($this->livestreamLink->live),
            )
        ];
       
        
    }
}
