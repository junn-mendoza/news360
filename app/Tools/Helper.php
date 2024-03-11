<?php
namespace App\Tools;
use Illuminate\Support\Str;
use App\Enums\CategoryColor;
class Helper {
    public static function getColor($name)
    {
        return CategoryColor::getColor(
            Str::replace(' ','',
            
                Str::upper($name)
                
            )
        );
    }

    
}