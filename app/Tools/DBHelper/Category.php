<?php
namespace App\Tools\DBHelper;
use App\Http\Resources\ArticleResource;
use App\Services\ArticleService;

class Category extends Base 
{
    private $ids = [];
    private $data = [];
    protected $articleService;
    private $limit = 3;
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
      
    }    

    public function getDataResource($catGroup, &$data, &$ids, $filterLimit = null): void 
    {
        $this->limit = $filterLimit ?? $this->limit;
        $this->data = $data;
        $this->ids = $ids;
       
        foreach($catGroup as $key=>$value) {
            $this->newsSlider($key,$value, $this->ids);
        }
       
        $this->data['newsSlider']['CATEGORY'] = $catGroup;
        $data = $this->data;
        $ids = $this->ids;
    }
    
    private function newsSlider($key,$value, $ids = null)
    {
         $query = $this->articleService->getArticles($this->limit, $value, $ids);
      
        $category = ArticleResource::collection($query);
        $this->data['newsSlider'][$key] = $category;
        $tmp = $category->pluck('id')->toArray();
        $this->ids = array_merge($this->ids, $tmp);

    }

}

