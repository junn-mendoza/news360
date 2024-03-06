<?php
namespace App\Repositories;
use App\Http\Resources\ArticleResource;
use App\Services\ArticleService;
use RepositoryInterface;

class Category extends Base 
{
    private $ids = [];
    private $data = [];
    protected $articleService;
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
      
    }    

    public function getDataResource($catGroup, &$data, &$ids): void 
    {
        $this->data = $data;
        $this->ids = $ids;
        foreach($catGroup as $key=>$value) {
            $this->newsSlider($key,$value);
        }
        $data = $this->data;
        $ids = $this->ids;
    }
    
    private function newsSlider($key,$value)
    {
        $query = $this->articleService->getArticles(3, $value);
        $category = ArticleResource::collection($query);
        $this->data['newsSlider'][$key] = $category;
        $tmp = $category->pluck('id')->toArray();
        $this->ids = array_merge($this->ids, $tmp);

    }

}

