<?php
// app/Services/ArticleService.php

namespace App\Services;

use ReflectionClass;
use App\Models\Article;
use App\Enums\CategoryEnum;
use App\Models\ArticleCategory;

class ArticleService
{
    private function getCategoryList()
    {
         // Get all category IDs from the enum excluding 'LIVE' and 'SONA'
         $category = new CategoryEnum;
        
         $categoryList = array_diff(array_values(
             (new ReflectionClass($category))->getConstants()
         ), 
             [CategoryEnum::LIVE, 
             CategoryEnum::SONA]) ;
 
         $categoryIds = array_diff(array_values($categoryList), 
             [CategoryEnum::LIVE, 
             CategoryEnum::SONA]);
        return $categoryIds;
    }

    private function getLatestArticlesByCategories($limit = 10, $ids = null, $included = [])
    {
         
        $articleCategory = ArticleCategory::query();    

        $orderIds = $articleCategory
            ->ByDemand($ids ?? [], $included)
            ->limit($limit)->get();

        $generateIds = $orderIds->pluck('article_id')->toArray();  
        return $generateIds;
    }


    public function getArticles($limit = null, $category_ids = null, $ids = null)
    {    
        
        $category_ids = !is_null($category_ids) && !is_array($category_ids)
            ? explode(',', $category_ids) : $category_ids;
        $orderIds = $this->getLatestArticlesByCategories($limit,$ids,$category_ids);
       
        $query = Article::query();

        // Apply eager loading for the 'files' relationship
        $query->with(['files','categories'])
            ->whereHas('files'); 

        $query->OrderedByIdArray($orderIds);
        
        $article = $query->get();
 
        return $article;
    }
}
