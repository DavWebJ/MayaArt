<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PostTable extends LivewireDatatable
{
    public $model = Post::class;
    public function builder()
    {
        return Post::query()
        ->with('postcategory');
        
    }
    public function columns()
    {
        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('desc')
                 ->filterable(),

            Column::name('title')
                ->label('Titre'),

          
            Column::name('published_at')
                ->label('Publier le : '),
                

            Column::name('postcategory.name')
                ->label('Catégorie : '),

            
            Column::callback(['image'], function ($image) {
                
                return view('admin.action.columunimage', ['image'=>$image]);
               
            })->label('image artice'),

            Column::callback(['id','slug'], function ($id,$slug) {

                    return view('admin.action.postaction', ['id' => $id,'slug'=>$slug]);
   

            }),


        ];
    }
}
