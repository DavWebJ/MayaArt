<?php

namespace App\Http\Livewire;

use App\Models\Option;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component
{
    public function remove($rowId)
    {
      
        Cart::instance('cart')->remove($rowId);
       $this->emitTo('cart-count-component','refreshComponent');


    }

    public function increase($rowId)
    {
        
        $product = Cart::instance('cart')->get($rowId);
        $stock = $product->model->stock;
        if($product->qty  >= $stock)
        {
            Session::flash('error', 'Pas assez de stock');
            Cart::instance('cart')->update($rowId,$product->qty);
        }else
        {
            $qty = $product->qty + 1;
            Cart::instance('cart')->update($rowId,$qty);
        }
       $this->emitTo('cart-count-component','refreshComponent');


      
    }
    public function decrease($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        if($qty <= 0)
        {
            $qty = 0;
            Cart::instance('cart')->update($rowId,$qty);
        }else{
            Cart::instance('cart')->update($rowId,$qty);
        }
        $this->emitTo('cart-count-component','refreshComponent');
        

    }

    public function checkout()
    {

      return redirect()->route('shipping.create');

    }
    public function render()
    {

        
        return view('livewire.cart-component')->layout('layouts.master');
    }
}
