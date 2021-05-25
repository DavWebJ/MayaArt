<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class WishlistPageComponent extends Component
{
    public function removeFromWishlistComponent($product_id)
    {
      foreach (Cart::instance('wishlist')->content() as $witem) {
        if($witem->id == $product_id)
        {
            Cart::instance('wishlist')->remove($witem->rowId);
            $this->emitTo('wish-list-count-component','refreshComponent');
            $this->emitTo('wishlist-dynamique','refreshComponent');
            return;
        }
      }

    }

    public function moveProductFromWishlistToCart($rowId)
    {
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        
        $product_id = $item->id;

        $double =  Cart::instance('cart')->search(function ($cartItem, $rowId) use($product_id){
            return $cartItem->id === $product_id;
        });
        if($double->isNotEmpty() )
        {
            return;
        }

        $product = Product::where('id',$item->id)->first();

        $product_name = $product->name;

        if($product->price_promos != 0)
        {
            
            $product_price = $product->price - $product->price_promos;

        }else{

            $product_price = $product->price;
            
        }

        Cart::instance('cart')->add($product_id, $product_name,1,$product_price)->associate(Product::class);
        $this->emitTo('wish-list-count-component','refreshComponent');
        $this->emitTo('wishlist-dynamique','refreshComponent');
        $this->emitTo('cart-count-component','refreshComponent');
        $this->emitTo('cart-dynamique-component','refreshComponent');

    }

    public function render()
    {
        return view('livewire.wishlist-page-component')->layout('layouts.master');
    }
}
