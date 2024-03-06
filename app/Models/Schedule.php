<?php

namespace App\Models;

use App\Models\ScheduleLivestreamLink;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;
    public function liveStreamLink()
    {
        return $this->hasOne(ScheduleLivestreamLink::class, 'schedule_id');
    }
}
