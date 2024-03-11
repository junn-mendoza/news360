<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleLivestreamLink extends Model
{
    use HasFactory;
    protected $table = 'schedules_livestream_links';
    public function filesRelatedMorph()
    {
        return $this->hasOne(FilesRelatedMorph::class, 'related_id', 'live_id')
        ->where('related_type', 'api::live.live');;
    }

    public function live()
    {
        return $this->belongsTo(Live::class, 'live_id');
    }
}
