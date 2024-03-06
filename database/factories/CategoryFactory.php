<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            ['name'=>'International', 'order'=>1, 'showmenu'=>true],
            ['name'=>'Provincial', 'order'=>1, 'showmenu'=>true],
            ['name'=>'Sports', 'order'=>1, 'showmenu'=>true],
            ['name'=>'Opinion', 'order'=>1, 'showmenu'=>true],
            ['name'=>'Business', 'order'=>1, 'showmenu'=>true],
            ['name'=>'Health', 'order'=>1, 'showmenu'=>true],
            ['name'=>'Live', 'order'=>1, 'showmenu'=>true],
            ['name'=>'Entertainment', 'order'=>1, 'showmenu'=>true],
            ['name'=>'Music', 'order'=>1, 'showmenu'=>true],
            ['name'=>'Exclusive', 'order'=>1, 'showmenu'=>true],
            ['name'=>'Breaking News', 'order'=>1, 'showmenu'=>true],
            ['name'=>'Technology', 'order'=>1, 'showmenu'=>true],
            ['name'=>'News Programs', 'order'=>1, 'showmenu'=>true],


        
        ];
    }
}
