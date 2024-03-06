<?php

namespace App\Models;

use App\Models\FilesRelatedMorph;
use App\Models\BannerSliderDetail;
use App\Models\BannerSliderComponent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BannerSlider extends Model
{
    use HasFactory;
    protected $fillable = ['title'];
    protected $table = 'bannersliders';

    /**
     * Get the banners associated with the banner slider.
     */
    public function components()
    {        
        return $this->hasMany(BannerSliderComponent::class, 'entity_id');        
        
    }

    
}
