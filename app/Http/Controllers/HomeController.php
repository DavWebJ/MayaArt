<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Header;
use App\Models\Promotion;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {

        $products = Product::with('category')->orderBy('Created_at','desc')->take(4)->get();
        $promos = Promotion::with('product')->first();
        $promos_2 = Promotion::with('product')->skip(1)->first();
        $category = Category::with('products')->get();
        $products_cat = Product::with('category')->get();
        $header = Header::first();
        $header_2 = Header::skip(1)->first();
        $header_3 = Header::skip(2)->first();


        return view('home',compact(['products','promos','category','products_cat','promos_2','header','header_2','header_3']));

    }
    public function about()
    {
        $rate = Rating::with('product','user')->where('status',1)->get();
        return view('about',compact('rate'));
    }
    public function portfolio()
    {

        return view('portfolio');
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
