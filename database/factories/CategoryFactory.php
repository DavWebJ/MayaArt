<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomcat = ['pantalon','jupes','sac','chaussures','chaussettes','chemise','pull'];
      
        $name = $this->faker->unique->companySuffix .' '. Arr::random($randomcat);
        $slug = Str::slug($name, '-');
        return [
            'name'=>$name,
            'slug'=>$slug,
        ];
    }
}
