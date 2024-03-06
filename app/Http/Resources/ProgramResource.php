<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'slug' => $this->slug,
            'director' => $this->director,
            'producer' => $this->producer,
            'ratings' => $this->ratings,
            'timeslot' => $this->timeslot,
            'url' => $this->url,
            'location' => $this->location,
            'genre' => $this->genre,
            'character' => $this->character,
            'playlist' => $this->playlist,
            'files' => FileResource::collection($this->whenLoaded('files')),

        ];
    }
}
