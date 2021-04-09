<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class OrderCustomerTable extends LivewireDatatable
{
    public $model = Order::class;
    
    public function builder()
    {
        $id = Auth::user()->id;
        return Order::query()
        ->where('user_id','=',$id);
        
    }
    public function columns()
    {
        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('asc')
                 ->filterable(),

            Column::name('transaction_id')
                ->label('Transaction N° :'),

                Column::name('total')
                ->label('Total achat :'),

                Column::name('order_at')
                ->label('Acheter le :'),
                

        ];
    }
}