<?php

namespace App\Http\Livewire;


use App\Models\Header;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class HeaderTable extends LivewireDatatable
{
    public $model = Header::class;

    public function columns()
    {
        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('asc')
                 ->filterable(),

            Column::name('title')
                ->label('Titre'),

          
            Column::name('subtitle')
                ->label('sous titre'),

            
            Column::callback(['banner'], function ($banner) {
                
                return view('admin.action.columunimage', ['banner'=>$banner]);
               
            }),

            Column::callback(['id'], function ($id) {
      
                    return view('admin.action.headeraction', ['id' => $id]);
         

            }),


        ];
    }
}
