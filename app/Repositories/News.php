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

    public function getDataResource(&$ids, $limit = 10): JsonResource 
    {        
        $query = $this->articleService->getArticles($limit, null, $ids);
        return ArticleResource::collection($query);
    }    

    public function getDataArticles(&$ids, $limit = 16, $categories = null): JsonResource
    {
        $query = $this->articleService->getArticles($limit, $categories, $ids);
        
        //dd($query);
        $tmp = $query->pluck('id')->toArray();
        $ids = array_merge($ids, $tmp);
        return ArticleResource::collection($query);
    }

    public function getDataArticle( $id, &$ids): JsonResource
    {
        $query = $this->articleService->getArticle($id); 
        $tmp = $query->pluck('id')->toArray();
        $ids = array_merge($ids, $tmp);     
        return ArticleResource::collection($query);
    }
    
}