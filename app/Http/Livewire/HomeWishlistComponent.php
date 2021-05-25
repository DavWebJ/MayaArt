<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;


class HomeWishlistComponent extends Component
{
    public function addToWishlist($product_id)
    {
        $product  = Product::where('id','=',$product_id)->with('options')->firstOrFail();
        $product_name = $product->name;

        $product_price = $product->price;
            
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate(Product::class);
        $this->emitTo('wish-list-count-component','refreshComponent');
        $this->emitTo('wishlist-dynamique','refreshComponent');
    }

    public function removeFromWishlist($product_id)
    {
        $rows  = Cart::instance('wishlist')->content();
        $rowId = $rows->where('id', $product_id)->first()->rowId;
         Cart::instance('wishlist')->remove($rowId);
        $this->emitTo('wish-list-count-component','refreshComponent');
        $this->emitTo('wishlist-dynamique','refreshComponent');
    }


    public function render()
    {
        $products = Product::with('category')->orderBy('Created_at','desc')->take(4)->get();

        return view('livewire.home-wishlist-component',
        [
            'products'=>$products
        ]
        )->layout('layouts.master');
    }
}
