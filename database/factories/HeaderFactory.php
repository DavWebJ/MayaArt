<?php

namespace Database\Factories;

use App\Models\Header;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class HeaderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Header::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(1,true),
            'subtitle' => $this->faker->words(1,true),
            'banner'=> 'https://picsum.photos/1920/750?random=' .$this->faker->numberBetween($min = 1, $max = 75) ,
            'alt'=>$this->faker->word(),
        ];
    }
}
