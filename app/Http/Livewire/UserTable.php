<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UserTable extends LivewireDatatable
{
    public $model = User::class;

    public function builder()
    {
        return User::query()
        ->with(['comments','orders','role']);
        
    }
    public function columns()
    {
        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('asc'),

            Column::name('email')
                ->label('Email')
                ->filterable(),
               
            Column::name('prenom')
                ->label('Prénom'),

            Column::name('name')
                ->label('Nom'),
            Column::name('role.role')
                ->label('Rôle'),

        ];
    }


}

