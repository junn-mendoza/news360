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
use App\Services\BannerService;
use App\Services\LiveService;
use Illuminate\Support\Facades\Cache;

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
        Cache::forget('HOMEPAGE');
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

            News::make($this->articleService)
                ->getDataResource($this->data, $this->ids);

            Series::make()->getDataResource($this->data);

            Programs::make()->getDataResource($this->data);

            $liveService = app(LiveService::class); // Resolve the Live repository from the service container
            Live::make()->getDataResource($liveService, $this->data);
          
            //dd(collect($this->data['LIVE'][0])->pluck('files')->toArray()[0]->url); 
            //Live::make()->getDataResource($this->data);
            // $this->data['BANNER'] = $this->bannerService->customizeBanner(
            //     Banner::make()
            //         ->getDataResource($this->data, PageEnum::HOMEPAGE)
            //     );
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
           
        
        // $test = $this->data['LIVE'];
        // foreach($test as $item) {
        //     foreach(collect($item) as $files) {
        //         dump($files->files->url);
        //     }
        // }
        // dd(collect($this->data['LIVE'][0])[0]->files->url);
        //dd($test);
        //foreach($test as $item) {
            // foreach($$test[0]['files'] ?? [] as $file) {
            //     dd($file->url);
            // }
             
        //}
        //dd($test->files);
        //son_decode(json_encode(
        //return response()->json( $this->data['LIVE'],200);
        //dd($this->data['BANNER']);
        return view('welcome', ['data' => $this->data] );
    }
}
