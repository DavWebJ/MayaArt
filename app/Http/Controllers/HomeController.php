<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Promotion;
use App\Models\PostCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index()
    {

        $posts = Post::all();
        if($posts->count() < 4 )
        {
            $posts = Post::with('postcategory')->orderBy('created_at','DESC')->get();
        }else
        {
            $posts = Post::with('postcategory')->orderBy('created_at','DESC')->take(4)->get();
        }
        $promos = Promotion::first();
        $categories = Category::with('products')->get();
        $products_cat = Product::with('category')->get();
        $author = User::where('role_id',2)->first();

        return view('home',compact(['posts','promos','categories','products_cat','author']));

    }
    public function about()
    {
        return view('about');
    }


    public function contact()
    {
        return view('contact');
    }

    public function mentions()
    {
        return view('terms');
    }




    
}
