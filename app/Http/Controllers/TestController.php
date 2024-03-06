<?php

namespace App\Http\Controllers;

use App\Repositories\Banner;
use App\Repositories\News;
use App\Repositories\Category;
use App\Repositories\Live;
use App\Repositories\Programs;
use App\Repositories\Series;

use App\Enums\CategoryEnum;
use App\Enums\PageEnum;
use App\Services\ArticleService;

class TestController extends Controller
{
    //
    protected $articleService;
    private $ids = [];
    private $data = [];
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }
    
    public function index()
    {        
        $catGroup = [
            'TECHNOLOGY'=>CategoryEnum::TECHNOLOGY,
            'SPORTS'=>CategoryEnum::SPORTS,
            'PROVINCIAL'=>CategoryEnum::PROVINCIAL,
            'INTERNATIONAL'=>CategoryEnum::INTERNATIONAL,
        ];
        Category::make($this->articleService)
            ->getDataResource($catGroup, $this->data, $this->ids);
      
        News::make($this->articleService)
            ->getDataResource($this->data, $this->ids);
       
        Series::make()->getDataResource($this->data);

        Programs::make()->getDataResource($this->data);

        Live::make()->getDataResource($this->data);
        
        Banner::make()->getDataResource($this->data, PageEnum::HOMEPAGE);
        return response()->json($this->data);

    }

    
}
