<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Header extends Component
{
    public $cartTotal = 0;



    public function mount()
    {
        $this->cartTotal = Cart::count();
    }

    public function render()
    {
        return view('livewire.header');
    }

}
