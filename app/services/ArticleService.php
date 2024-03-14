<?php
// app/Services/ArticleService.php

namespace App\Services;

use App\Models\Article;

class ArticleService
{
    public function getArticles($limit = null, $category_ids = null, $ids = null)
    {        
        // Start with the base query
        $query = Article::query();

        // Apply eager loading for the 'files' relationship
        $query->with(['files','categories']);

        $query->whereHas('files');
        // Check if $categories is provided and process accordingly
        if (!is_null($category_ids)) {
            
            $category_ids = explode(',', $category_ids);
           
            // If $categories is an array and not empty, filter articles by categories
           if (is_array($category_ids) && !empty($category_ids)) {
                $query->whereHas('categories', function ($query) use ($category_ids) {
                    
                    $query->whereIn('categories.id', $category_ids);

                });
            }
        }

        if( $ids ) {
            $query->whereNotIn('id', $ids); 
        }
        // Check if $limit is provided and process accordingly
        if ($limit || $limit > 0) {
            // If $limit is greater than 0, apply limit to the query
            $articles = $query->limit($limit);
        } 
        
        // Apply order by created_at in descending order
        $query->orderBy('created_at', 'desc');

        // Fetch the articles
        $articles = $query->get();
        return $articles;
    }
}
