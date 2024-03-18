<?php
namespace App\Repositories;

use App\Models\Article;
use App\Services\ArticleService;
use App\Http\Resources\ArticleResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class News extends Base 
{
    protected $articleService;
    
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function getDataResource(&$data, &$ids): void 
    {        
        $query = $this->articleService->getArticles(100, null, $ids);
        $news = ArticleResource::collection($query);
        $data['LATESTNEWS'] = $news->splice(0, 25);
        $data['OTHERNEWS'] = $news->splice(0, 25);
        $data['TOPNEWS'] = $news;      
    }

    public function getDataArticle(&$data, &$ids, $count = 16, $categories = null): JsonResource
    {
        $query = $this->articleService->getArticles($count, $categories, $ids);
        //dd($query);
        $tmp = $query->pluck('id')->toArray();
        $ids = array_merge($ids, $tmp);
        return ArticleResource::collection($query);
    }

    // public function groupOf4(&$ids, $cateoryGroup): JsonResource
    // {
    //     $mergedResults = collect(); 
    //     foreach($cateoryGroup as $grp){
    //         $query = $this->articleService->getArticles(1, $grp, $ids);
    //         $tmp = $query->pluck('id')->toArray();
    //         $ids = array_merge($ids, $tmp);
    //         $mergedResults = $mergedResults->merge($query);
    //     }
    //     return ArticleResource::collection($mergedResults);
    // }

    // public function getByArticleByCategory(&$ids, $limits): JsonResource
    // {
    //     $query = $this->articleService->getLatestArticlesByCategories($limits, $ids);
    //     $tmp = $query->pluck('id')->toArray();
    //     $ids = array_merge($ids, $tmp);
        //$mergedResults = $mergedResults->merge($query);

        // $mergedResults = collect(); 
        // foreach($cateoryGroup as $grp){
        //     $query = $this->articleService->getArticles(1, $grp, $ids);
        //     $tmp = $query->pluck('id')->toArray();
        //     $ids = array_merge($ids, $tmp);
        //     $mergedResults = $mergedResults->merge($query);
        // }
    //    return ArticleResource::collection($query);
    //}
    
}