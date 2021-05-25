<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ProductsTable extends LivewireDatatable
{
    public $model = Product::class;

    public function builder()
    {
        return Product::query()
        ->with('category');
        
    }
    public function columns()
    {
        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('asc')
                 ->filterable(),

            Column::name('name')
                ->label('Produit')
                ->filterable(),

            Column::name('price')
                ->filterable()
                ->label('Prix'),

            Column::callback(['stock'], function ($stock) {
            
                return view('admin.action.stock', ['stock'=>$stock]);
            })->label('Stock :'),

            Column::name('category.name')
                ->label('Catégorie : ')
                ->filterable(),

            Column::callback(['id', 'slug'], function ($id, $slug) {
  
                return view('admin.action.productaction', ['id' => $id, 'slug' => $slug]);
         

            })->label('modifier,voir,supprimer'),

        ];
    }
}
