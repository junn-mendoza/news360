<?php
// app/Services/ArticleService.php

namespace App\Services;

use ReflectionClass;
use App\Models\Article;
use App\Models\Category;
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

    public function getArticlesByCategory($categories, $limit) 
    {
        //     $categoryIds = array_map('intval', $categories);
          
        //     $fetchedCategories = Category::whereIn('id', $categoryIds)->get();
          
        //     $articles = [];
        //     foreach ($fetchedCategories as $category) {
        //       $articles[$category->id] = $category->articles()->latest()->limit($limit)->get();
        //     }
          
        //    dd($articles);
          

        $categoryIds = array_map('intval', $categories); // Ensure numeric IDs

        $categories = Category::scopeLatestArticlesByCategory(Category::query(), $categoryIds, $limit);

        $articles = [];
        foreach ($categories as $category) {
            $articles = array_merge($articles, $category->articles->toArray());
        }
        dd($articles);
        return $articles;

        dump($limit);
        $categories = Category::whereIn('category_id',$categories);
        $categories->latestArticles($limit)
        //whereHas(['latestArticles' => function ($query) use ($limit) {
              //  $query->latest()->limit($limit);
          //  }])
            //->has('latestArticles', '>=', $limit)
            //->where('category_id',$categories)
            ->get();
        dd($categories);

    }
    private function getLatestArticlesByCategories($limit = 10, $ids = null, $included = [])
    {
        $articleCategory = ArticleCategory::query();    
        $ids = array_filter($ids);
        $orderIds = $articleCategory
            ->ByDemand($ids ?? [], $included)
            ->limit($limit)->get();
      
        $generateIds = $orderIds->pluck('article_id')->toArray();  
        return $generateIds;
    }

    public function getArticle($id)
    {   $field = is_int($id)?'id':'slug';
        return Article::with(['files','categories'])
                  ->where($field,$id)->get(); 

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
        
        $article = $query->inRandomOrder()->get();
  
        return $article;
    }
}
