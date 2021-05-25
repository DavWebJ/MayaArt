<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Category;
use App\Models\Option;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence(1);
         $slug = Str::slug($name, '-');
        return [
            'name' =>$name,
            'desc' => $this->faker->paragraphs(4,true),
            'slug' => $slug,
            'detail' => $this->faker->paragraphs(1,true),
            'main_image'=> 'https://picsum.photos/270/360?random=' .$this->faker->numberBetween($min = 1, $max = 75) ,
            'category_id' =>Category::all()->random()->id,
            'meta'=>$this->faker->word(),
            'price'=>$this->faker->numberBetween($min = 10, $max = 200),
            'price_promos'=>0,
            'stock'=>$this->faker->numberBetween($min = 0, $max = 20),

        ];
    }
}
