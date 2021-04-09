<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class OrderTable extends LivewireDatatable
{
    public $model = Order::class;

    public function builder()
    {
        return Order::query()
        ->with('user')
        ->with('products');
        
    }
    public function columns()
    {
        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('asc')
                 ->filterable(),

            Column::name('transaction_id')
                ->label('Transaction N° :')
                ->filterable(),

                Column::name('total')
                ->label('Total achat :'),
                
                Column::name('user.email')
                ->label('Email du client'),

                Column::name('user.name')
                ->label('Nom du client'),


            Column::callback(['id'], function ($id) {

                return view('admin.action.ordersaction', ['id' => $id]);
       

            }),
           

        ];
    }
}
