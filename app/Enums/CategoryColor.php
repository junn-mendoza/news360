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
            'MUSIC' => '#ff0000',
            'BUSINESS' => '#7e00ff',
            'EXCLUSIVE' => '#353535',
            'NEWSPROGRAMS' => '#235158',
            'TECHNOLOGY' => '#50561a',
            'HEALTH' => '#13025a',
            default => '#f87425',
        }; 
    }
    
}