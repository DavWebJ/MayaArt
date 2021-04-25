<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Factories\Factory;

class PromotionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Promotion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(1,true),
            'desc' => $this->faker->paragraphs(3,true),
            'banner'=> 'https://picsum.photos/700/400?random=' .$this->faker->numberBetween($min = 1, $max = 75) ,
            'alt'=>$this->faker->word(),
            'product_id'=>Product::all()->random()->id,
        ];
    }
}
