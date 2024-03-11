<?php
namespace App\Enums;
class CategoryColor 
{
    public static function getColor($category)
    {
        return match($category) {
            'SPORTS' => '#cdb307',
            'INTERNATIONAL' => '#1a75fe',
            'NATIONALNEWS' => '#c61afe',
            'ENTERTAINMENT' => '#359d3a',
            'PROVINCIAL' => '#b92f2f',
            default => '#f87425',
        }; 
    }
    
}