<?php

namespace App\Http\Controllers\Home;

use App\Tools\DBHelper\News;
use App\Tools\DBHelper\Category;
use App\Tools\DBHelper\Live;
use App\Tools\DBHelper\Programs;
use App\Tools\DBHelper\Series;

use App\Enums\CategoryEnum;
use App\Services\ArticleService;
use App\Services\BannerService;
use App\Services\LiveService;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    //
    protected $articleService;
    protected $bannerService;
    private $ids = [];
    private $data = [];
    public function __construct(
        ArticleService $articleService,
        BannerService $bannerService,
    )
    {
        $this->articleService = $articleService;
        $this->bannerService = $bannerService;
    }

    public function index()
    {
        $this->ids = [7258, 7257, 7251,7161, 7061, 7611, 7585 ];
        if (Cache::has('HOMEPAGE')) {
            $this->data = Cache::get('HOMEPAGE');
        } else {
            $catGroup = [
                'TECHNOLOGY' => CategoryEnum::TECHNOLOGY,
                'SPORTS' => CategoryEnum::SPORTS,
                'PROVINCIAL' => CategoryEnum::PROVINCIAL,
                'INTERNATIONAL' => CategoryEnum::INTERNATIONAL,
            ];
            Category::make($this->articleService)
                ->getDataResource($catGroup, $this->data, $this->ids);
 
            $news = News::make($this->articleService)
                ->getDataResource($this->ids,100);

            $this->data['OTHERNEWS'] = $news->splice(0, 24);
            $this->data['LATESTNEWS'] = $news->splice(0, 24);
            
            $this->data['TOPNEWS'] = $news;       

            Series::make()->getDataResource($this->data);

            Programs::make()->getDataResource($this->data);

            $liveService = app(LiveService::class); // Resolve the Live repository from the service container
            Live::make()->getDataResource($liveService, $this->data);
          
            Cache::add('HOMEPAGE',$this->data, 15 );
        }
        $this->data['BANNER'][] = [
            'video' => 'mfs.mp4',
            'logo' => 'mfs.png',
            'day' => 'Friday',
            'time' => '3:30 - 5:00PM'
        ];
        $this->data['BANNER'][] = [
            'video' => 'bp.mp4',
            'logo' => 'bp.svg',
            'day' => 'Saturday',
            'time' => '6:00-7:00PM (Primetime)'
        ];
        $this->data['BANNER'][] = [
            'video' => 'extraction3.mp4',
            'logo' => 'extraction3.png',
            'day' => 'Sunday',
            'time' => '4:00 - 5:00PM'
        ];
           
        return view('welcome', ['data' => $this->data, 'banners' =>  $this->data['BANNER']] );
    }
}
