<?php

namespace App\Models;

use App\Tools\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    /**
     * Get the articles associated with the category.
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_categories');
    }

    public function latestArticle()
    {
        return $this->belongsToMany(Article::class, 'article_categories')
            ->orderByDesc('articles.date')
            ->limit(1);
    }

    public static function scopeLatestArticlesByCategory(Builder $query, $categoryIds, $limit)
    {
       // return $query->whereIn('id', $categoryIds)->with('articles')->get();
       return $query->whereIn('id', $categoryIds)
        ->with(['articles' => function ($query) use ($limit) {
            $query->latest()->limit($limit);
        }])
        ->get();
    }

    public function latestArticles($limit)
    {
        return $this->articles()
            ->orderBy('date', 'desc')
            ->limit($limit);
    }
    
    public function getColorAttribute()
    {
        return Helper::getColor($this->name);
    }
    
}
