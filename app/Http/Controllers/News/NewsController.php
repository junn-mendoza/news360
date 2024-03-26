<?php

namespace App\Http\Controllers\News;

use App\Tools\Helper;
use App\Enums\CategoryEnum;
use App\Services\ArticleService;
use App\Tools\DBHelper\ProcessDB;
use App\Http\Controllers\News\Init;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    use Init;
    protected $articleService;
    protected $data = [];
    private $ids = [7632, 7630, 7628, 7631, 6946];

    public function __construct(
        ArticleService $articleService
    ) {
        $this->articleService = $articleService;
    }

    public function index()
    {
        $this->init($this->data);

        $process = collect([
            ['category'=>'BREAKING_NEWS', 'limit'=>3, 'cat_id'=> CategoryEnum::BREAKING_NEWS],
            ['category'=>'ENTERTAINMENT', 'limit'=>25, 'cat_id'=>CategoryEnum::ENTERTAINMENT],
            ['category'=>'SPORTS', 'limit'=>25, 'cat_id'=>CategoryEnum::SPORTS],
            ['category'=>'INTERNATIONAL', 'limit'=>25, 'cat_id'=>CategoryEnum::INTERNATIONAL],
        ]);

        $process->map(function ($item) {
             $this->data[$item['category']] = ProcessDB::make(
                $this->ids, 
                $this->articleService,
                $item['limit'], 
                $item['cat_id']);
        });
       
        $process = collect([
            ['key'=>'Technology', 'color'=> '#5b21b6'],
            ['key'=>'Entertainment', 'color'=> '#be123c'],
            ['key'=>'Health','color'=> '#256d26'],
         ]);

        $infoBlock = [];
        
        $process->map(function ($item) {
            $infoBlock[$item['key']] = (object) [
                'title' => $item['key'],
                'key' => $item['key'],
                'data' => ProcessDB::make(
                   $this->ids, 
                   $this->articleService,
                   7, Helper::getCategoryValue($item['key'])),
                'color' => $item['color'],  
                ];
        });
        $this->data['CATEGORY_BLOCK'] = $infoBlock;        
 
        $group = [
            CategoryEnum::BUSINESS,
            CategoryEnum::EXCLUSIVE,
            CategoryEnum::INTERNATIONAL,
            CategoryEnum::NATIONAL_NEWS,
        ];

        $process = collect([
            ['category'=>'FEATURED', 'limit'=> 4, 'cat_id'=> $group],
            ['category'=>'TIDBITS', 'limit'=> 2, 'cat_id'=> CategoryEnum::OPINION],
            ['category'=>'MOREARTICLES_1', 'limit'=> 4, 'cat_id'=> $group],
            ['category'=>'MOREARTICLES_2', 'limit'=> 4, 'cat_id'=> $group],
            ['category'=>'MISSED', 'limit'=> 83, 'cat_id'=> null ],
         ]);

         $process->map(function ($item) {
            $this->data[$item['category']] = ProcessDB::make(
               $this->ids, 
               $this->articleService,
               $item['limit'], 
               $item['cat_id']);
       });

        return view('news', ['data' => $this->data]);
    }

    
}
