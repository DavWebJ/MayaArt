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
        $products = Product::with('category')->where('stock','>',0)->orderBy('Created_at','desc')->get();
         $others = Product::with('category')->where('stock','>',0)->take(6)->get();
        $promos = Promotion::with('product')->get();
        $category = Category::with('products')->get();
        $products_cat = Product::with('category')->get();


        return view('home',compact(['products','promos','category','products_cat','others']));

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
