<?php

namespace App\Http\Livewire;

use App\Models\PostCategory;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PostCategoryTable extends LivewireDatatable
{
    public $model = PostCategory::class;

    public function columns()
    {
        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('asc')
                 ->filterable(),

            Column::name('name')
                ->label('Nom de la catégorie')
                 ->filterable(),

            Column::name('slug')
                ->label('Slug de la catégorie'),



            Column::callback(['id'], function ($id) {

                    return view('admin.action.postcategoriesaction', ['id' => $id]);
             

            })


        ];
    }
}

