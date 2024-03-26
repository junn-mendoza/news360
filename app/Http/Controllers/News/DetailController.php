<?php

namespace App\Http\Controllers\News;

use App\Tools\Helper;
use App\Tools\DBHelper\Category as CategoryRepository;
use App\Tools\DBHelper\News;
use App\Enums\CategoryEnum;
use Illuminate\Http\Request;
use App\Services\ArticleService;
use App\Http\Controllers\Controller;
use App\Http\Controllers\News\Init;

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

    public function show(Request $request)
    {
        $this->init($this->data);
        $this->ids = [ $request->id,  7258, 7257, 7251,7161, 7061, 7611, 7585, 7283   ];
        $catGroup = [
            'TECHNOLOGY' => CategoryEnum::TECHNOLOGY,
            'SPORTS' => CategoryEnum::SPORTS,
            'ENTERTAINMENT' => CategoryEnum::ENTERTAINMENT ,
            
        ];
        CategoryRepository::make($this->articleService)
            ->getDataResource($catGroup, $this->data, $this->ids, 5);
        // dd(1);
        
        //$this->ids = [];
        $this->data['DETAIL'] = News::make($this->articleService)
            ->getDataArticle($request->id, $this->ids);

        $news = News::make($this->articleService)
            ->getDataResource($this->ids, 110);

        $this->data['MISSED'] = $news->splice(0,70);    
        $this->data['OTHER_NEWS'] = $news->splice(0,10);
           
       
        return view('detail', [
            'data' => $this->data, 
            'content' => $this->helper->extractData($this->data['DETAIL'][0]->content)]);
    }    

   

    
}
