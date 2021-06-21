<?php

namespace App\Http\Livewire;


use App\Models\Promotion;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PromoTable extends LivewireDatatable
{
    public $model = Promotion::class;

    public function columns()
    {
        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('asc')
                 ->filterable(),

            Column::name('title')
                ->label('Titre'),

          
            Column::name('end')
                ->label('Prendra fin le'),

            
            Column::callback(['banner'], function ($banner) {
                
                return view('admin.action.columunimage', ['banner'=>$banner]);
               
            }),

            Column::callback(['id'], function ($id) {
      
                    return view('admin.action.promoaction', ['id' => $id]);
         

            }),
            Column::delete()


        ];
    }
}
