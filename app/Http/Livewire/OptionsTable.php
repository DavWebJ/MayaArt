<?php

namespace App\Http\Livewire;

use App\Models\Option;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class OptionsTable extends LivewireDatatable
{
    public $model = Option::class;

    public function builder()
    {
        return Option::query()
        ->with('products');
        
    }
    public function columns()
    {
        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('asc')
                  ->linkTo('boutique'),
    

                Column::name('products.slug')
                ->label('Produit de base')
                ->filterable(),

            Column::name('option')
                ->label('Option du produit'),

            Column::name('option_price')
            ->label('Prix de cette option'),
          

            Column::callback(['id'], function ($id) {
  
                return view('admin.action.optionaction', ['id' => $id]);
         

            })->label('Modifier, supprimer'),
          

        ];
    }
}
