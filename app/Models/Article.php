<?php

namespace App\Models;

use App\Tools\Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'media',
        'url',
        'content',
        'date',
    ];
    /**
     * Get the categories associated with the article filtered by category IDs if provided.
     * If $category_ids is null or empty, return all categories.
     *
     * @param mixed $category_ids
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_categories');
    }

    /**
     * Get all of the files related to the article.
     */
    public function files()
    {
        return $this->belongsToMany(
            File::class, 
            'files_related_morphs',
            'related_id','file_id')
                ->where('related_type', 'api::article.article');
       
    }

    public function scopeOrderedByIdArray(Builder $query, array $idArray)
    {
        // works in mysql
        // $idString = implode(',', $idArray);
        // return $query->whereIn('id', $idArray)
        //     ->orderByRaw(DB::raw('FIELD(id, ?)'), [$idString]);
    
        // works in postgres
        return $query->whereIn('id',  $idArray)
            ->orderByRaw("CASE id " . 
                implode(" ", array_map(function($id, $index) {
                    return "WHEN " . $id . " THEN " . $index;
                },  $idArray, range(1, count( $idArray)))) .
            " END");
           
    }

     /**
     * Convert the date to formatted Value
     *  example 10 mins 3 sec ago
     */
    public function getTimeStringAttribute()
    {
          
        return Helper::updateTimeDifference($this->date);
    }
    
     /**
     * Find an article by its slug.
     *
     * @param string $slug
     * @return \App\Article|null
     */
    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->first();
    }
}
