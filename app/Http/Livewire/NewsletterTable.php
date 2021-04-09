<?php

namespace App\Http\Livewire;


use App\Models\newsletter;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class NewsletterTable extends LivewireDatatable
{
    public $model = newsletter::class;

    public function builder()
    {
        return newsletter::query();

        
    }
    public function columns()
    {
        return [

            Column::name('id')
                 ->label('#')
                 ->defaultSort('asc'),

            Column::name('email')
                ->label('Email'),

        ];
    }


}

