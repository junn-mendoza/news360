<?php

namespace App\DataTransferObjects;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BannerDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $banner_slider_id,
        public readonly string $title,
        public readonly string $video,
        public readonly string $poster,
        public readonly bool $show,
        public readonly string $logo,
        public readonly string $time_slot,
        public readonly string $slug,
        public readonly string $subtitle,
        public readonly string $link,
        public readonly string $image_logo,
        public readonly int $logo_width,
        public readonly Carbon $created_at,
        public readonly Carbon $updated_at,
    ) {

    }

    public static function fromResource(JsonResource $resource): self
    {
        return new self(
            id: $resource->id,
            banner_slider_id: $resource->banner_slider_id,
            title: $resource->title,
            video: $resource->video,
            poster: $resource->poster,
            show: (bool) $resource->show,
            logo: $resource->logo,
            time_slot: $resource->time_slot,
            slug: $resource->slug,
            subtitle: $resource->subtitle,
            link: $resource->link,
            image_logo: $resource->image_logo,
            logo_width: $resource->logo_width,
            created_at: Carbon::parse($resource->created_at),
            updated_at: Carbon::parse($resource->updated_at),
        );
    }
}