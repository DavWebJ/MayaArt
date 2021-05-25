<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Header extends Component
{
    

    protected $listeners = [
        'refreshcart' => '$refreshcart',
    ];

    public function mount()
    {
        $this->cartTotal = Cart::count();
    }

    public function render()
    {
        return view('livewire.header');
    }


}
