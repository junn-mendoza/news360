<?php

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can create a category', function () {
    $category = Category::create([
        'name' => 'Example Category',
        // Add other required fields here...
    ]);

    expect($category->name)->toBe('Example Category');
});

it('can retrieve a category by id', function () {
    $category = Category::create([
        'name' => 'Example Category',
        // Add other required fields here...
    ]);

    $retrievedCategory = Category::find($category->id);

    expect($retrievedCategory->name)->toBe('Example Category');
});
