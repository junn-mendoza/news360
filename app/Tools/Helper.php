<?php
namespace App\Tools;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Enums\CategoryColor;

class Helper {

    public static function getCategoryValue($category) {

        $cleanCategory = Str::upper(Str::replace(' ','_',$category));

        return constant("App\Enums\CategoryEnum::$cleanCategory");

    }

    public static function getColor($name)
    {
        return CategoryColor::getColor(
            Str::replace(' ','',
                Str::upper($name)
            )
        );
    }

 
    public static function updateTimeDifference($datetime)
    {
        $now = Carbon::now();
        $datetimeValue = Carbon::parse($datetime);
        $timeDifference = $now->diff($datetimeValue);

        $formattedTimeDifference = '';
        
        // Get the time difference components
        // $days = $timeDifference->d;
        // $hours = $timeDifference->h;
        $minutes = $timeDifference->i;
        $seconds = $timeDifference->s;

        // Format the time difference string
        $formattedTimeDifference = "{$minutes}m {$seconds}s ago";

        return $formattedTimeDifference;
    }


    public function extractData($articleDetails = null): string
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

    public function testText(): string
    {
        
        return <<<TEXT
                    <p>Lagpas na sa P14-trillion mark ang utang ng bansa noong katapusan ng Mayo, mas mataas ng 1.33% kumpara noong buwan ng Abril.</p><p>&nbsp;</p><p>Ayon sa Treasury, mahigit two-thirds o 68% ng kabuuang utang ay domestic borrowings habang ang nalalabing 32% ay mula sa foreign lenders.</p><p>&nbsp;</p><p>Nagkakahalaga ng P9.59 trillion ang domestic debt ng bansa habang nasa P4.51 trillion naman ang foreign debt.</p><p>&nbsp;</p>
                    <p style="text-align:justify;">~1</p>
                    <p>“Moreover, the impact of peso depreciation against the US dollar padded the value of onshore foreign currency-denominated securities by P1.56 billion,” pahayag ng Treasury.</p>
                    <p style="text-align:justify;">~1</p>
                    <p>&nbsp;</p><p>Wala pang isang taon mula nang manungkulan bilang presidente si Pangulong Ferdinand Marcos Jr., nakapagdagdag na ang administrasyon niya ng P1.31 trillion sa mga utang ng bansa.</p><p>&nbsp;</p><p>Para sa mga ekonomista, nananatiling 'manageable' ang debt level ng bansa dahil kaya naman daw sabayan ng paglago ng ekonomiya ang halaga ng servicing debt.</p><p>&nbsp;</p><p>Nauna nang iginiit ng gobyerno na ang debt-to-GDP ratio ay tumaas sa 60.9% noong 2022.</p>
                TEXT;
    }

    
}