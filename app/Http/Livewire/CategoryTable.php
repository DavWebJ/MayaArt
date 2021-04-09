<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CategoryTable extends LivewireDatatable
{
    public $model = Category::class;

    public function columns()
    {
        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('asc')
                 ->filterable(),

            Column::name('name')
                ->label('Nom de la  catégorie')
                ->filterable(),
            Column::name('slug')
                ->label('Slug de la  catégorie'),

            Column::callback(['id'], function ($id) {

                    return view('admin.action.categoriesaction', ['id' => $id]);
             

            })


        ];
    }
}
