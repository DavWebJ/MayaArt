<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartDynamiqueComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function remove($rowId)
    {
      
        Cart::instance('cart')->remove($rowId);
       $this->emitTo('cart-count-component','refreshComponent');
       return redirect()->back();


    }

    public function render()
    {
       
        return view('livewire.cart-dynamique-component')->layout('layouts.master');
    }
}
