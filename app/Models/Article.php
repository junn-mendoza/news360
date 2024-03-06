<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'media',
        'url',
        'content',
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
            File::class, 'files_related_morphs','related_id','file_id')
                ->where('related_type', 'api::article.article');
       
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
