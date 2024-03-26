<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use App\Http\Resources\ArticleResource;
use App\Services\ArticleService;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index()
    {
       
        $articles = Article::with('categories')
            ->with('files')
            ->limit($limits ?? 50)            
            ->orderBy('articles.created_at','desc')
            ->get();
        
        // Retrieve the article
        
        
        // Return the article resource
        return ArticleResource::collection($articles);
    }
    public function show($id)
    {
        // Retrieve the article
        $article = Article::with('categories')->with('files')->findOrFail($id);

        // Return the article resource
        return ArticleResource::make($article);
    }

    public function articlescategories($limits=null, $categories=null)
    {       
        $query = $this->articleService->getArticles($limits, $categories);
        
        return ArticleResource::collection($query);
    }
}
