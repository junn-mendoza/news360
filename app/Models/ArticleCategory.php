<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleCategory extends Model
{
    use HasFactory;
    protected $table='article_categories';

    public function category_name() : HasOne
    {
        return $this->hasOne(Category::class, 'category_id','id');
    }

    public function article() : HasMany
    {
        return $this->hasMany(Article::class, 'article_id','id');
    }

    public function scopeByDemand(Builder $query, array $excludedArticleIds = [], $includedCategory = null)
    {
        $query = $query->selectRaw('*, DENSE_RANK() OVER (PARTITION BY category_id ORDER BY article_id DESC) AS rank')
            ->whereNotIn('article_id', $excludedArticleIds);

        if($includedCategory) {
            $query->whereIn('category_id', $includedCategory);
        }    
        
        $query->orderBy('rank')
            ->orderBy('category_id')
            ->orderBy('article_id', 'desc');
        return $query;
    }
}
