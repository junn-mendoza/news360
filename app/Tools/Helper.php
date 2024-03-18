<?php
namespace App\Tools;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Enums\CategoryColor;
use ReflectionClass;

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
        $formattedTimeDifference = "{$minutes} min {$seconds} sec ago";

        return $formattedTimeDifference;
    }



    
}