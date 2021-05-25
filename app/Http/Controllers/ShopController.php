<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {

        $category = Category::with('products')->get();
        $products = Product::with('category','ratings')->orderBy('created_at', 'desc')->paginate(5);
        
        return view('shop',compact("category","products"));
    }

    public function loadmore()
    {
        return view('shop-filter');
    }

    public function filterby(Request $request)
    {
        if ($request->ajax()) {

            $category = Category::with('products')->get();
            $products = Product::with('category','ratings')->orderBy('Created_at','desc')->get();
            switch ($request->data) {
                case 'bydate':
                    break;
                default:
                    # code...
                    break;
            }
        }
    }
    
    public function updatingFilter($value)
    {
        if($value == "default")
        {
            $this->products = Product::with('category','ratings')->orderBy('Created_at','desc')->get();
        }else if($value = "rating")
        {
 
             $this->products = Product::with('category','ratings')
             ->join('ratings', 'products.id', '=', 'ratings.product_id')
             ->where('status','=',1)
             ->orderBy('rating','DESC')
            ->groupBy('ratings.id')
             ->get();
        }
    }


}
