<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\DataTransferObjects\BannerDTO;
use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            BannerDTO::fromResource($this)
            // 'id' => $this->id,
            // 'banner_slider_id' => $this->banner_slider_id,
            // 'title' => $this->title,
            // 'video' => $this->video,
            // 'poster' => $this->poster,
            // 'show' => (bool) $this->show,
            // 'logo' => $this->logo,
            // 'time_slot' => $this->time_slot,
            // 'slug' => $this->slug,
            // 'subtitle' => $this->subtitle,
            // 'link'  => $this->link,
            // 'image_logo' => $this->image_logo,
            // 'logo_width' => $this->logo_width,
            // 'created_at' => Carbon::parse($this->created_at),
            // 'updated_at' => Carbon::parse($this->updated_at),
        ];        
    }
}
