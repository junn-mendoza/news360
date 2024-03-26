<?php
namespace App\Http\Controllers\News;

use App\Models\Category;
use App\Http\Resources\CategoryResource;
Trait Init
{
    private function init(&$data)
    {
        $category = Category::where('showmenu', 1)
           ->get();
        $data['CATEGORY'] = CategoryResource::collection($category);
    }
}