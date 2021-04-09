<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OrderActionComponent extends Component
{
    public $order;
    
    public function mount($order)
    {
        $this->order = $order;
    }
    public function render()
    {
        return view('livewire.order-action-component');
    }
}
