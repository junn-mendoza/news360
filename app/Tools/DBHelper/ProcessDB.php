<?php 
namespace App\Tools\DBHelper;
use App\Enums\CategoryEnum;
use App\Tools\DBHelper\News;


class ProcessDB 
{   
    public static function make(&$ids, $articleService, $limit, $cat_id)
    {
        return News::make($articleService)
            ->getDataArticles( $ids, $limit,  $cat_id);
    }   
}