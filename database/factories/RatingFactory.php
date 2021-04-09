<?php

namespace Database\Factories;

use App\Models\Rating;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rating::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $content = $this->faker->sentence(6, true);

        return [
            'comment'=>$content,
            'rating' => $this->faker->numberBetween($min = 1, $max = 5) ,
            'product_id'=>Product::all()->random()->id,
            'user_id'=>User::all()->random()->id,
            'status'=>0
   
        ];
    }
}
