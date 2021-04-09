<?php

namespace App\Http\Livewire\Customer;

use App\Models\Option;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component
{
    public function remove($rowId)
    {
      
        Cart::remove($rowId);
        Session::flash('success', 'Cet article a bien été suprimé de votre panier');

    }

    public function increase($rowId)
    {
        
        $product = Cart::get($rowId);
        $stock = $product->model->stock;
        if($product->qty  >= $stock)
        {
            Session::flash('error', 'Pas assez de stock');
            Cart::update($rowId,$product->qty);
        }else
        {
            $qty = $product->qty + 1;
            Cart::update($rowId,$qty);
        }


      
    }
    public function decrease($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        if($qty <= 0)
        {
            $qty = 0;
            Cart::update($rowId,$qty);
        }else{
            Cart::update($rowId,$qty);
        }
        

    }

    public function checkout()
    {

      return redirect()->route('shipping.create');

    }
    public function render()
    {

        
        return view('livewire.customer.cart-component')->layout('layouts.appcart');
    }
}
