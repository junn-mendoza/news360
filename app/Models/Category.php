<?php

namespace App\Models;

use App\Tools\Helper;
use Illuminate\Database\Eloquent\Model;
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

    public function getColorAttribute()
    {
        return Helper::getColor($this->name);
    }
    
}
