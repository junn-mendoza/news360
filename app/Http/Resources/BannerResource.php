<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
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
            'id' => $this->id,
            'banner_slider_id' => $this->banner_slider_id,
            'title' => $this->title,
            'video' => $this->video,
            'poster' => $this->poster,
            'show' => $this->show,
            'logo' => $this->logo,
            'time_slot' => $this->time_slot,
            'slug' => $this->slug,
            'subtitle' => $this->subtitle,
            'link' => $this->link,
            'image_logo' => $this->image_logo,
            'logo_width' => $this->logo_width,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
