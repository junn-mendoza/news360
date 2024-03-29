<?php

namespace App\Http\Controllers\Api;

use App\Enums\CategoryEnum;
use App\Tools\DBHelper\Live;
use App\Tools\DBHelper\News;
use App\Services\LiveService;
use App\Tools\DBHelper\Series;
use App\Services\BannerService;
use App\Services\ArticleService;
use App\Tools\DBHelper\Category;
use App\Tools\DBHelper\Programs;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class MainController extends Controller
{
    //
    protected $articleService;
    protected $bannerService;
    private $ids = [7258, 7257, 7251,7161, 7061, 7611, 7585 ];
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
           
            $this->data['BANNER'][] = [
                'video' => 'mfs.mp4',
                'logo' => 'mfs.png',
                'day' => 'Friday',
                'time' => '3:30 - 5:00PM'
            ];
            $this->data['BANNER'][] = [
                'video' => '3_in_1.mp4',
                'logo' => '3_in_1.png',
                'day' => 'Sunday',
                'time' => '8:PM (Primetime)'
            ];
            $this->data['BANNER'][] = [
                'video' => 'open_for_business.mp4',
                'logo' => 'open_for_business.png',
                'day' => 'Sunday',
                'time' => '9:00PM'
            ];
            //dd(response()->json($this->data));
            Cache::add('HOMEPAGE',$this->data, 15 );
           

        }
        return $this->data;
    }
    
}
