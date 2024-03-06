<?php

use App\Models\Article;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can create an article', function () {
    $article = Article::create([
        'slug' => 'example-article',
        'title' => 'Example Article',
        'description' => 'test 123',
        'media' => 'https://helloworld.jpg',
        'url' => 'https://123',
        'content'  => 'lorem ipsum',
        // Add other required fields here...
    ]);

    expect($article->slug)->toBe('example-article');
});

it('can retrieve an article by slug', function () {
    $article = Article::create([
        'slug' => 'example-article',
        'title' => 'Example Article',
        'description' => 'test 123',
        'media' => 'https://helloworld.jpg',
        'url' => 'https://123',
        'content'  => 'lorem ipsum',


        // Add other required fields here...
    ]);

    $retrievedArticle = Article::findBySlug('example-article');

    expect($retrievedArticle->title)->toBe('Example Article');

});

it('can accept only images and videos for media field', function () {
    Storage::fake('public');

    // Create a sample article with media ending with "jpg"
    $article1 = Article::create([
        'slug' => 'example-article-1',
        'title' => 'Example Article 1',
        'description' => 'test 123',
        'media' => 'test.jpg',
        'url' => 'https://example.com',
        'content' => 'lorem ipsum',
        // Add other required fields here...
    ]);

    // Check if the media string ends with "video" or "image"
    expect($article1->media)->toMatch('/\.(jpg|jpeg|png|gif|bmp|svg)$/i');

    // Create a sample article with media ending with "mp4"
    $article2 = Article::create([
        'slug' => 'example-article-2',
        'title' => 'Example Article 2',
        'description' => 'test 123',
        'media' => 'test.mp4',
        'url' => 'https://example.com',
        'content' => 'lorem ipsum',
        // Add other required fields here...
    ]);

    // Check if the media string ends with "video" or "image"
    expect($article2->media)->toMatch('/\.(jpg|jpeg|png|gif|bmp|svg|mp4)$/i');

    
});

it('it creates the article_category table with the expected schema', function () {
    // Ensure the article_category table exists
    $this->assertTrue(Schema::hasTable('article_category'));

    // Verify the schema of the article_category table
    $this->assertTrue(Schema::hasColumns('article_category', [
        'article_slug',
        'category_id',
        'created_at',
        'updated_at'
    ]));



});

