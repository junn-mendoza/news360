<?php

namespace App\Http\Controllers\News;

use App\Tools\Helper;
use App\Enums\CategoryEnum;
use App\Tools\DBHelper\News;
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
       
        $infoBlock = [];
        $key = 'Technology';
        $infoBlock[$key] = (object)[
            'title' => $key,
            'key' => $key,
            'data' => News::make($this->articleService)
                ->getDataArticles( $this->ids, 7,  Helper::getCategoryValue($key)),
            'color' =>  '#5b21b6',
        ];
       
        $key = 'Entertainment';
        $infoBlock[$key] = (object)[
            'title' => $key,
            'key' => $key,
            'data' => News::make($this->articleService)
                ->getDataArticles($this->ids, 7, Helper::getCategoryValue($key)),
            'color' => '#be123c',
        ];

        $key = 'Health';
        $infoBlock[$key] = (object)[
            'title' => $key,
            'key' => $key,
            'data' => News::make($this->articleService)
                ->getDataArticles($this->ids, 7,  Helper::getCategoryValue($key)),
            'color' =>  '#256d26',
        ];
        $this->data['CATEGORY_BLOCK'] = $infoBlock;
 
        $this->data['TECHNOLOGY'] = News::make($this->articleService)
            ->getDataArticles($this->ids, 7, CategoryEnum::TECHNOLOGY);

        $this->data['HEALTH'] = News::make($this->articleService)
            ->getDataArticles($this->ids, 7, CategoryEnum::HEALTH);

        $this->data['MUSIC'] = News::make($this->articleService)
            ->getDataArticles($this->ids, 7, CategoryEnum::MUSIC);

        $group = [
            CategoryEnum::BUSINESS,
            CategoryEnum::EXCLUSIVE,
            CategoryEnum::INTERNATIONAL,
            CategoryEnum::NATIONAL_NEWS,
        ];
        $this->data['FEATURED'] = News::make($this->articleService)
            ->getDataArticles($this->ids, 4, $group);

        $this->data['TIDBITS'] = News::make($this->articleService)
            ->getDataArticles($this->ids, 2, CategoryEnum::OPINION);
        $group = [
            CategoryEnum::BUSINESS,
            CategoryEnum::SPORTS,
            CategoryEnum::INTERNATIONAL,
            CategoryEnum::PROVINCIAL,
        ];
        $this->data['MOREARTICLES_1'] = News::make($this->articleService)
            ->getDataArticles($this->ids, 4, $group);
        $group = [
            CategoryEnum::ENTERTAINMENT,
            CategoryEnum::MUSIC,
            CategoryEnum::TECHNOLOGY,
            CategoryEnum::HEALTH,
        ];
        $this->data['MOREARTICLES_2'] = News::make($this->articleService)
            ->getDataArticles($this->ids, 4, $group);


        $this->data['MISSED'] = News::make($this->articleService)
            ->getDataArticles($this->ids, 80);

        return view('news', ['data' => $this->data]);
    }

    
}
