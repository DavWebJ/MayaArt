<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class UserOrder extends Component
{
    
    public $transaction_id;

    public function mount($transaction_id)
    {
        $this->transaction_id = $transaction_id;
        
    }
    public function render()
    {
        
        $transaction = Transaction::where('user_id',Auth::user()->id)->where('transaction_id',$this->transaction_id)->with('order')->first();
        
        $order = Order::where('user_id',Auth::user()->id)->where('id',$transaction->order_id)->with('orderItems')->first();
       
       $order_items = OrderItem::where('order_id',$order->id)->with('order','products')->get();


        return view('livewire.user-order',
             [
                'transaction'=>$transaction,
                'order_items'=>$order_items,
                'order'=>$order
            ])->layout('layouts.master');
    }
}
