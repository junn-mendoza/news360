<?php

namespace App\Http\Controllers;

use App\Enums\CategoryColor;
use App\Models\Category;
use App\Repositories\News;
use App\Enums\CategoryEnum;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\ArticleService;
use App\Http\Resources\CategoryResource;

class NewsController extends Controller
{
    protected $articleService;
    protected $data = [];
    private $ids = [];
    
    public function __construct(
        ArticleService $articleService
    )
    {
        $this->articleService = $articleService;
    }
    public function index() {
        
        $this->ids = [7632,7630,7628,7631,6946];
        //dd(CategoryColor::getColor( Str::replace(' ','',Str::upper('National News'))) );
        $category = Category::where('showmenu',1)->get();
        $this->data['CATEGORY'] = CategoryResource::collection($category);

        // breaking news 5
        $this->data['BREAKING_NEWS'] = News::make($this->articleService)
            ->getDataArticle($this->data,$this->ids,5, CategoryEnum::BREAKING_NEWS);

        //dd($this->data['BREAKING_NEWS']);

        $this->data['ENTERTAINMENT'] = News::make($this->articleService)
            ->getDataArticle($this->data,$this->ids,25, CategoryEnum::ENTERTAINMENT);
        
        $this->data['SPORTS'] = News::make($this->articleService)
            ->getDataArticle($this->data,$this->ids,25, CategoryEnum::SPORTS);

        $this->data['INTERNATIONAL'] = News::make($this->articleService)
            ->getDataArticle($this->data,$this->ids,25, CategoryEnum::INTERNATIONAL);

        $this->data['TECHNOLOGY'] = News::make($this->articleService)
            ->getDataArticle($this->data,$this->ids,7, CategoryEnum::TECHNOLOGY);
        
        $this->data['HEALTH'] = News::make($this->articleService)
            ->getDataArticle($this->data,$this->ids,7, CategoryEnum::HEALTH);
        
        $this->data['MUSIC'] = News::make($this->articleService)
            ->getDataArticle($this->data,$this->ids,7, CategoryEnum::MUSIC);

            $group = [
                CategoryEnum::BUSINESS,
                CategoryEnum::EXCLUSIVE,
                CategoryEnum::INTERNATIONAL,
                CategoryEnum::NATIONAL_NEWS,
            ];
        $this->data['FEATURED'] = News::make($this->articleService)
            ->groupOf4($this->ids, $group);
        
        //dd($this->data['FEATURED']);    
        $this->data['TIDBITS'] = News::make($this->articleService)
            ->getDataArticle($this->data,$this->ids,2, CategoryEnum::OPINION);    
            $group = [
                CategoryEnum::BUSINESS,
                CategoryEnum::SPORTS,
                CategoryEnum::INTERNATIONAL,
                CategoryEnum::PROVINCIAL,
            ];
        $this->data['MOREARTICLES_1'] = News::make($this->articleService)
            ->groupOf4($this->ids, $group);
            $group = [
                CategoryEnum::ENTERTAINMENT,
                CategoryEnum::MUSIC,
                CategoryEnum::TECHNOLOGY,
                CategoryEnum::HEALTH,
            ];
        $this->data['MOREARTICLES_2'] = News::make($this->articleService)
            ->groupOf4($this->ids, $group);
        
            $group = [
               
                CategoryEnum::MUSIC,
                CategoryEnum::TECHNOLOGY,
                CategoryEnum::HEALTH,
                CategoryEnum::BUSINESS,
                CategoryEnum::EXCLUSIVE,
                CategoryEnum::INTERNATIONAL,
                CategoryEnum::NATIONAL_NEWS,
                CategoryEnum::OPINION,
                CategoryEnum::NEWS_PROGRAMS,
                CategoryEnum::SPORTS,
                CategoryEnum::ENTERTAINMENT,
                CategoryEnum::MUSIC,
                CategoryEnum::TECHNOLOGY,
                CategoryEnum::HEALTH,
                CategoryEnum::BUSINESS,
                CategoryEnum::EXCLUSIVE,
                CategoryEnum::INTERNATIONAL,
                CategoryEnum::NATIONAL_NEWS,
                CategoryEnum::OPINION,
                CategoryEnum::NEWS_PROGRAMS,
                CategoryEnum::SPORTS,
                CategoryEnum::ENTERTAINMENT,
                CategoryEnum::MUSIC,
                CategoryEnum::TECHNOLOGY,
                CategoryEnum::HEALTH,
                CategoryEnum::BUSINESS,
                CategoryEnum::EXCLUSIVE,
                CategoryEnum::INTERNATIONAL,
                CategoryEnum::NATIONAL_NEWS,
                CategoryEnum::OPINION,
                CategoryEnum::NEWS_PROGRAMS,
                CategoryEnum::SPORTS,
                CategoryEnum::ENTERTAINMENT,
                CategoryEnum::MUSIC,
                CategoryEnum::TECHNOLOGY,
                CategoryEnum::HEALTH,
                CategoryEnum::OPINION,
                CategoryEnum::INTERNATIONAL,
                CategoryEnum::EXCLUSIVE,
                CategoryEnum::SPORTS,
            ];
        $this->data['MISSED'] = News::make($this->articleService)
            ->groupOf4($this->ids, $group);

        //dd( $this->data['MISSED']);
        //dd($this->data['MOREARTICLES']);    
        return view('news',['data' => $this->data]);
    }
}
