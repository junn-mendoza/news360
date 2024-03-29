<?php

namespace App\Http\Controllers\Api;

use App\Tools\Helper;
use App\Tools\DBHelper\Category as CategoryRepository;
use App\Tools\DBHelper\News;
use App\Enums\CategoryEnum;
use Illuminate\Http\Request;
use App\Services\ArticleService;
use App\Http\Controllers\Controller;
use App\Services\Init;

class DetailController extends Controller
{
    use Init;
    protected $articleService;
    protected $data = [];
    private $ids = [];
    private $helper;
    public function __construct(
        ArticleService $articleService
    ) {
        $this->articleService = $articleService;
        $this->helper = new Helper(); 
    }

    public function index(Request $request)
    {
        
        $this->init($this->data);
       
        $this->ids = [ $request->id,  7258, 7257, 7251,7161, 7061, 7611, 7585, 7283 , 7258, 7257  ];
        
        $this->data['DETAIL'] = News::make($this->articleService)
            ->getDataArticle($request->slug, $this->ids);

        $catGroup = [
            'TECHNOLOGY' => CategoryEnum::TECHNOLOGY,
            'SPORTS' => CategoryEnum::SPORTS,
            'ENTERTAINMENT' => CategoryEnum::ENTERTAINMENT ,
            
        ];
        CategoryRepository::make($this->articleService)
            ->getDataResource($catGroup, $this->data, $this->ids, 5);
        
        $this->data['CONTENT'] = $this->helper->extractData($this->data['DETAIL'][0]->content);   
        $news = News::make($this->articleService)
            ->getDataResource($this->ids, 111);

        $this->data['MISSED'] = $news->splice(0,70);    
        $this->data['OTHER_NEWS'] = $news->splice(0,10);
           
        return $this->data;
        
    }    

   

    
}
