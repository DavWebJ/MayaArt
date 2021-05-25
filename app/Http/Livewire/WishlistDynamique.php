<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class WishlistDynamique extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
    
    public function remove($rowId)
    {
      
        Cart::instance('wishlist')->remove($rowId);
       $this->emitTo('wish-list-count-component','refreshComponent');
       return redirect()->back();


    }
    public function render()
    {
        return view('livewire.wishlist-dynamique');
    }
}
