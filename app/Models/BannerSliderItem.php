<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FilesRelatedMorph;
class BannerSliderItem extends Model
{
    use HasFactory;
    protected $table = 'components_sections_bannerslideritems';
    public function files()
    {
        return $this->morphMany(FilesRelatedMorph::class, 'related',null,'id');
    }
}
