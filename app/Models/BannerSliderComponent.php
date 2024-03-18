<?php

namespace App\Models;

use App\Models\BannerSliderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BannerSliderComponent extends Model
{
    use HasFactory;
    protected $table = 'bannersliders_components';
    protected $fillable = ['entity_id', 'component_id'];
    
    /**
     * Get all of the files related to the article.
     */
    public function files()
    {
        return $this->hasManyThrough(File::class, FilesRelatedMorph::class, 'related_id', 'id', 'component_id', 'file_id')
            ->where('files_related_morphs.related_type', 'sections.bannerslideritem');
           
    }

       
    public function component()
    {
        return $this->belongsTo(BannerSliderDetail::class, 'component_id');
    }
}
