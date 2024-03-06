<?php
namespace App\Repositories;
use App\Services\ArticleService;
use App\Http\Resources\ArticleResource;

class News extends Base 
{
    protected $articleService;
    
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function getDataResource(&$data, &$ids): void 
    {        
        $query = $this->articleService->getArticles(100, null,$ids);
        $news = ArticleResource::collection($query);
        $data['LATESTNEWS'] = $news->splice(0, 25);
        $data['OTHERNEWS'] = $news->splice(0, 25);
        $data['TOPNEWS'] = $news;
      
    }
}