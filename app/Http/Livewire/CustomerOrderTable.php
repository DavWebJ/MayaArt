<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CustomerOrderTable extends LivewireDatatable
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
                 ->defaultSort('asc'),

            Column::name('transaction_id')
                ->label('Transaction N°'),

            Column::name('order_at')
                ->label('Commandé le :'),
            
            Column::name('user.name')
                ->label('Nom du client'),

            Column::name('user.prenom')
                ->label('Prénom du client'),

            Column::name('user.email')
                ->label('Email du client'),


            Column::name('status')
            ->label('Statut'),

            Column::callback(['total'], function ($total) {

                return view('admin.action.total', ['total' => $total]);
       

            })->label('Total'),

            Column::callback(['transaction_id','id'], function ($transaction_id,$id) {
              
                return view('admin.action.orderaction', ['transaction_id'=>$transaction_id,'id'=>$id]);
                

            })->label('Action'),
                

        ];
    }
}
