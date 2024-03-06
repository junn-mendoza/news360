<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

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

  
    // Verify the primary key constraint
    // $this->assertTrue(Schema::hasPrimaryKey('article_category', ['article_slug', 'category_id']));
});

//it('it establishes the correct relationships between articles and categories', function () {
    // Your test logic here
//});


