<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
         $slug = Str::slug($title, '-');

        return [
            'title' =>$title,
            'content' => $this->faker->paragraphs(3,true),
            'slug' => $slug,
            'image'=> 'https://picsum.photos/200/200?random=' .$this->faker->numberBetween($min = 1, $max = 75) ,
            'meta'=>$this->faker->word(),
            'alt'=>$this->faker->word(),
            'user_id' => 1,
            'post_category_id'=> PostCategory::all()->random()->id,
            'published_at'=>Carbon::now(),

        ];
    }
}
