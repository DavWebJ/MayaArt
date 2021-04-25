<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;


class ShopComponents extends Component
{
    

    public function render()
    {
        $lastproduct = Product::latest('created_at')->first();
        $id  = $lastproduct->id;
        
        $category = Category::with('products')->get();
        $productsCount =  Product::where('stock','>',0)->count();

        //$products = Product::with('category')->where('id','!=',$id)->where('stock','>',0)->paginate(9);
        $products = Product::with('category','ratings')->where('stock','>',0)->orderBy('Created_at','desc')->paginate(9);
        
        return view('livewire.shop-components',
        [
            'lastproduct'=>$lastproduct,
            'products'=>$products,
            'category'=>$category,
            'productsCount'=>$productsCount
        ])->layout('layouts.master');
    }
}
