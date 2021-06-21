<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CouponTable extends LivewireDatatable
{
    public $model = Coupon::class;

    public function builder()
    {
        return Coupon::query();
  
        
    }
    public function columns()
    {
        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('asc')
                 ->filterable(),
            Column::name('code')
                ->label('Code promo'),
       
            Column::name('type')
                ->label('Type de coupon'),

            Column::name('value')
            ->label('Valeur'),

            Column::name('cart_value')
            ->label('Valeur min du panier'),
            Column::name('expiry_date')
            ->label('Expire le:'),

                Column::callback(['id'], function ($id) {

                    return view('admin.action.couponaction', ['id'=>$id]);
   

            }),
           


        ];
    }


}