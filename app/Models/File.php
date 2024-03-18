<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    

    /**
     * Get the articles associated with the category.
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'files_related_morphs','file_id','related_id');
    }

    /**
     * Get the articles associated with the category.
     */
    public function schedule_links()
    {
        return $this->belongsToMany(
            ScheduleLivestreamLink::class, 
            'schedules_livestream_links',
            'live_id',
            'schedule_id');
    }

    public function morphable()
    {
        return $this->morphTo();
    }

    public function getSwiperAttribute()
    {
        return (int)(($this->width*600)/$this->height);
        
    }
    
}
