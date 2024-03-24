<?php

namespace App\Http\Controllers;

use ReflectionClass;
use App\Tools\Helper;
use ReflectionProperty;
use App\Repositories\Category as CategoryRepository;
use App\Models\Category;
use App\Repositories\News;
use App\Enums\CategoryEnum;
use Illuminate\Support\Str;
use App\Enums\CategoryColor;
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
    ) {
        $this->articleService = $articleService;
    }

    public function show(Request $request)
    {
        $this->ids = [ $request->id,  7258, 7257, 7251,7161, 7061, 7611, 7585, 7283   ];
        $catGroup = [
            'TECHNOLOGY' => CategoryEnum::TECHNOLOGY,
            'SPORTS' => CategoryEnum::SPORTS,
            'ENTERTAINMENT' => CategoryEnum::ENTERTAINMENT ,
            
        ];
        CategoryRepository::make($this->articleService)
            ->getDataResource($catGroup, $this->data, $this->ids, 5);
        // dd(1);
        $this->init();
        //$this->ids = [];
        $this->data['DETAIL'] = News::make($this->articleService)
            ->getDataArticle($request->id, $this->ids);

        $news = News::make($this->articleService)
            ->getDataResource($this->ids, 110);

        $this->data['MISSED'] = $news->splice(0,70);    
        $this->data['OTHER_NEWS'] = $news->splice(0,10);
           
        

        //dd($this->data['DETAIL'][0]->content);

        // Output the modified text
        // dd( $text );
        // return $this->extractData($text);
        //  dd($this->data['DETAIL'][0]->files[0]->url);
        // $this->data['DETAIL'][0]->content
        return view('detail', ['data' => $this->data, 'content' => $this->extractData($this->data['DETAIL'][0]->content)]);
    }

    private function extractData($articleDetails = null): string
    {
        $articleDetails = $articleDetails ??  $this->testText();
       // dd($articleDetails);
        // Define the pattern to search for
        $pattern = '/<p style="text-align:justify;">~1<\/p>(.*?)<p style="text-align:justify;">~1<\/p>/s';
        $extractedArticle = $articleDetails;
        // Search for the pattern in the text
        if (preg_match($pattern, $articleDetails, $matches)) {
           // dump(1);
            // Extract the content between ~1 tags
            $extractedContent = $matches[1];
            $extractedContent = Str::replace('<p>&nbsp;</p>', '', $extractedContent);
            
            // Define the pattern to extract the image tag
            $imagePattern = '/<img.*?>/';

            //dump(0);
            // Search for the image tag in the extracted content
            if (preg_match($imagePattern, $extractedContent, $imageMatches)) {
              //  dump(2);
                // Extract the image tag
                $extractedImage = $imageMatches[0];

                // Define the pattern to remove the image tag
                $imagePattern = '/<figure class="image.*?>.*?<\/figure>/s';

                // Remove the image tag from the extracted content
                $plainText = Str::replaceMatches($imagePattern, '', $extractedContent);
                $plainText = Str::replaceMatches($imagePattern, '',$plainText);
                // Remove all HTML tags from the extracted content to get plain text
                // Wrap the extracted image and text in a div
                $extractedArticle = "<div class='x1'><div class='x1image'>" . $extractedImage . "</div><div class='x1text'>" . $plainText . "</div></div>";

                // Inject the extracted article back into the original text
                $text = Str::replaceMatches($pattern, $extractedArticle, $articleDetails);
                

                // Output the modified text
                //echo $text;
            } else {
                //dump(1);
                $pattern = '/<p style="text-align:justify;">~1<\/p>(.*?)<p style="text-align:justify;">~1<\/p>/s';
                $extractedArticle = "<div class='x1' style='width:60% '><div class='x1text' style='width:100%; margin-left:30px'>" . $extractedContent . "</div></div>";
                $text = Str::replaceMatches($pattern, $extractedArticle, $articleDetails);
                //$text = $extractedContent;

                //echo "Image tag not found.";
              //  dump(3);
            }
        } else {
           // dump(2);
            $text = $articleDetails;
            // echo "Pattern not found.";
        }
       // dd($text);
        return $text;
    }

    private function testText(): string
    {
        // return <<<TEXT
        //         <div class="article-content font-montserrat lg:text-justify text-sm sm:text-md md:text-lg text-gray-800 dark:text-gray-200 mt-2 mx-5 w-0 min-w-full mr-10 pr-10 lg:pr-20"><div><p style="text-align:justify;">Bawal pa rin ang pagkain ng shelllfish products kabilang ang tahong, talaba at halaan na mula sa apat na baybayin sa bansa dahil mataas pa rin dito ang toxicity level ng red tide toxins.</p>
        //         <p style="text-align:justify;">~1</p>
        //         <figure class="image image_resized image-style-align-left" style="width:39.04%;">
        //             <img class="image_resized image" src="https://net25-content.s3.us-west-2.amazonaws.com/istockphoto_1395718636_612x612_06b2af7110.jpg" alt="istockphoto-1395718636-612x612.jpg" srcset="https://net25-content.s3.us-west-2.amazonaws.com/thumbnail_istockphoto_1395718636_612x612_06b2af7110.jpg 233w,https://net25-content.s3.us-west-2.amazonaws.com/small_istockphoto_1395718636_612x612_06b2af7110.jpg 500w," sizes="100vw" width="500px">
        //         </figure><p>&nbsp;</p>
        //         <p>&nbsp;</p>
        //         <p style="text-align:justify;">
        //             Ito ang inihayag ni Bureau of Fisheries and Aquatic Resources (BFAR) Director Demosthenes Escoto.</p>
        //             <p style="text-align:justify;">&nbsp;</p>
        //             <p style="text-align:justify;">
        //             Nabatid na ang mga baybaying dagat na hindi maaaring pagkunan ng shellfish products ay ang Dauis at Tagbilaran City sa Bohol, San Pedro Bay sa Samar, Dumanguillas Bay sa Zamboanga del Sur, at Lianga Bay sa Surigao del Sur.
        //             </p>
        //         <p style="text-align:justify;">~1</p>
        //         </div><div><figure class="image image_resized image-style-align-left" style="width:38.27%;"><img class="image_resized" src="https://net25-content.s3.us-west-2.amazonaws.com/istockphoto_500292966_612x612_3d51203643.jpg" alt="istockphoto-500292966-612x612.jpg" srcset="https://net25-content.s3.us-west-2.amazonaws.com/thumbnail_istockphoto_500292966_612x612_3d51203643.jpg 235w,https://net25-content.s3.us-west-2.amazonaws.com/small_istockphoto_500292966_612x612_3d51203643.jpg 500w," sizes="100vw" width="500px"></figure><p style="text-align:justify;">&nbsp;</p><p style="text-align:justify;">Pinayuhan ng BFAR ang mga lokalidad ng naturang baybayin na huwag pahintulutang makarating sa palengke at mga pamilihan ang kanilang shellfish products dahil sa banta ng red tide.</p><p>&nbsp;</p><p style="text-align:justify;">Maaari naman umanog kainin ang mga produktong isda, pusit, hipon at alimango sa naturang mga baybayin basta linising mabuti bago iluto at kainin.</p><p>&nbsp;</p><figure class="image image_resized image-style-align-left" style="width:39.36%;"><img class="image_resized image" src="https://net25-content.s3.us-west-2.amazonaws.com/istockphoto_499026196_612x612_a9bfa5f2bc.jpg" alt="istockphoto-499026196-612x612.jpg" srcset="https://net25-content.s3.us-west-2.amazonaws.com/thumbnail_istockphoto_499026196_612x612_a9bfa5f2bc.jpg 236w,https://net25-content.s3.us-west-2.amazonaws.com/small_istockphoto_499026196_612x612_a9bfa5f2bc.jpg 500w," sizes="100vw" width="500px"></figure><p style="text-align:justify;">&nbsp;</p><p style="text-align:justify;">Ligtas naman sa red tide toxin ang karagatan ng Cavite, Las Piñas, Paranaque, Navotas, Bulacan at Bataan sa Manila Bay.</p><p style="text-align:justify;">&nbsp;</p><p style="text-align:justify;">&nbsp;</p></div></div>
        //     TEXT;  
        //<p style="text-align:justify;">~1</p>
        return <<<TEXT
                    <p>Lagpas na sa P14-trillion mark ang utang ng bansa noong katapusan ng Mayo, mas mataas ng 1.33% kumpara noong buwan ng Abril.</p><p>&nbsp;</p><p>Ayon sa Treasury, mahigit two-thirds o 68% ng kabuuang utang ay domestic borrowings habang ang nalalabing 32% ay mula sa foreign lenders.</p><p>&nbsp;</p><p>Nagkakahalaga ng P9.59 trillion ang domestic debt ng bansa habang nasa P4.51 trillion naman ang foreign debt.</p><p>&nbsp;</p>
                    <p style="text-align:justify;">~1</p>
                    <p>“Moreover, the impact of peso depreciation against the US dollar padded the value of onshore foreign currency-denominated securities by P1.56 billion,” pahayag ng Treasury.</p>
                    <p style="text-align:justify;">~1</p>
                    <p>&nbsp;</p><p>Wala pang isang taon mula nang manungkulan bilang presidente si Pangulong Ferdinand Marcos Jr., nakapagdagdag na ang administrasyon niya ng P1.31 trillion sa mga utang ng bansa.</p><p>&nbsp;</p><p>Para sa mga ekonomista, nananatiling 'manageable' ang debt level ng bansa dahil kaya naman daw sabayan ng paglago ng ekonomiya ang halaga ng servicing debt.</p><p>&nbsp;</p><p>Nauna nang iginiit ng gobyerno na ang debt-to-GDP ratio ay tumaas sa 60.9% noong 2022.</p>
                TEXT;
    }
    public function extractData2($txt)
    {
        $text = $txt;

        // Remove unwanted HTML elements
        $text = preg_replace('/<p.*?>\s*~1\s*<\/p>.*?<figure[^>]*>.*?<\/figure>/s', '', $text);

        // Extract image and text
        preg_match('/<img[^>]+>/', $text, $matches);
        $extractedImage = isset($matches[0]) ? $matches[0] : '';

        $extractedText = strip_tags($text);
        $extractedText = trim(preg_replace('/\s+/', ' ', $extractedText));

        // Modify text to match the desired format
        $extractedText = '<div class="">' . $extractedImage . '<span class="">' . $extractedText . '</span></div>';

        return response()->json([
            'extractedImage' => $extractedImage,
            'extractedText' => $extractedText
        ]);
    }

    private function init()
    {
        $category = Category::where('showmenu', 1)->get();
        $this->data['CATEGORY'] = CategoryResource::collection($category);
    }

    public function index()
    {

        $this->ids = [7632, 7630, 7628, 7631, 6946];

        $this->init();

        // breaking news 5
        $this->data['BREAKING_NEWS'] = News::make($this->articleService)
            ->getDataArticles( $this->ids, 3, CategoryEnum::BREAKING_NEWS);


        $this->data['ENTERTAINMENT'] = News::make($this->articleService)
            ->getDataArticles( $this->ids, 25, CategoryEnum::ENTERTAINMENT);

        $this->data['SPORTS'] = News::make($this->articleService)
            ->getDataArticles( $this->ids, 25, CategoryEnum::SPORTS);

        $this->data['INTERNATIONAL'] = News::make($this->articleService)
            ->getDataArticles( $this->ids, 25, CategoryEnum::INTERNATIONAL);

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
        //dd($this->data['CATEGORY_BLOCK']);
        // $this->data['CATEGORY_BLOCK']     
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

        //dd($this->data['FEATURED']);    
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
