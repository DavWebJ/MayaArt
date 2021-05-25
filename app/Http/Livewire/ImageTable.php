<?php

namespace App\Http\Livewire;

use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class imageTable extends LivewireDatatable
{
    public $model = ImageProduct::class;

    public function builder()
    {
        return ImageProduct::query()
        ->with('product');
        
    }
    public function columns()
    {
        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('asc')
                 ->filterable(),

            
            Column::name('product.slug')
                ->label('Produit de base')
                ->filterable(),

            // Column::callback(['id', 'slug'], function ($id, $slug) {
  
            //     return view('admin.action.productaction', ['id' => $id, 'slug' => $slug]);
         

            // })->label('modifier,voir,supprimer'),
            // Column::callback(['product_image'], function ($product_image) {

            //     return view('admin.action.productimage', ['product_image'=>$product_image]);
               
            // })->label('Image du produit'),
          

        ];
    }
}
