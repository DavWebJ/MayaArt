<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;

class UserOrderDetailComponent extends Component
{
    public $transaction_id;

    public function mount($transaction_id)
    {
        $this->transaction_id = $transaction_id;
        
    }
    public function render()
    {
       $order = Order::with('user','products')->where('user_id',Auth::user()->id)->where('transaction_id',$this->transaction_id)->first();

        return view('livewire.user-order-detail-component',
            [
                'order'=>$order,
            ]
        )->layout('layouts.master');
    }
}
