<?php

namespace App\Http\Livewire;

use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CommentTable extends LivewireDatatable
{
    public $model = Rating::class;

    public function builder()
    {
        return Rating::query()
        ->with(['user','products']);
        
    }
    public function columns()
    {
        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('asc')
                 ->filterable(),
            Column::name('user.email')
                ->label('Email'),
            Column::name('comment')
                ->label('Commentaire'),

            Column::name('rating')
                ->label('Note'),

            BooleanColumn::name('status')
                ->label('Statut')
                ->filterable(),

            Column::callback(['id','status'], function ($id,$status) {

                return view('admin.action.commentstatus', ['id'=>$id,'status' => $status]);
            })->label('Action'),
           
            Column::callback(['id'], function ($id) {
                return view('admin.action.commentaction', ['id'=>$id]);
            })->label('Voir cet avis'),

        ];
    }

    public function valide($id)
    {
        $comment = Rating::where('id',$id)->update(['status' =>  1]);
        return redirect()->back();
    }


}

