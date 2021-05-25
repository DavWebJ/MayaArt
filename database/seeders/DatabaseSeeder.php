<?php

namespace Database\Seeders;

use App\Models\Attributes;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Category;
use App\Models\Header;
use App\Models\ImageProduct;
use App\Models\Option;
use App\Models\Promotion;
use Illuminate\Support\Str;
use App\Models\PostCategory;
use App\Models\Rating;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $cat =  Category::factory()->count(5)->create();
      $user = User::factory(25)->create();
     
        //création des produits fake
      $product = Product::factory()->count(40)->create();
      $attr = Option::factory()->count(40)->create();
      $header = Header::factory()->count(3)->create();
      
        //création des roles utilisateurs fake
        $role = new Role();
        $role->role = 'customer';
        $role->save();

        $role = new Role();
        $role->role = 'admin';
        $role->save();
        //création de l' admin
        DB::table('users')->insert([
            'name' => 'admin',
            'prenom'=>'maya',
            'email'=> 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'role_id' => '2',

        ]);
    
      $promo =  Promotion::factory()->count(3)->create();
       $comments = Rating::factory()->count(20)->state(new Sequence(
             ['status' => 0],
             ['status' => 1],
         ))->create();

          $product->each(function (Product $r) use ($attr) {
            $r->options()->attach(
          [
          'product_id' => Product::all()->random()->id,
            'option_id'=> Option::all()->random()->id
           ]
       );
      });



    }
}
