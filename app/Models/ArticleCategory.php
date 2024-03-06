<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ArticleCategory extends Model
{
    use HasFactory;
    protected $table='article_categories';

    public function category_name() : HasOne
    {
        return $this->hasOne(Category::class, 'category_id','id');
    }
}
