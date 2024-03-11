<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    use HasFactory;
    /**
     * Get all of the files related to the article.
     */
    public function files()
    {
        return $this->belongsToMany(
            File::class, 'files_related_morphs','related_id','file_id')
                ->where('related_type', 'api::live.live');
       
    }

    /**
     * Scope a query to only include live streams where streaming is true.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStreaming($query)
    {
        return $query->where('streaming', true);
    }
}
