<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Actions\Fortify\UpdateUserPassword;

class PasswordChangeForm extends Component
{
    public $state = [
        'current_password' => '',
        'password' => '',
        'password_confirmation' => '',
    ];
    public function updateProfileInformation(UpdateUserPassword $updater)
    {
        $this->resetErrorBag();

        $updater->update(auth()->user(), $this->state);

        $this->state = [
            'current_password' => '',
            'password' => '',
            'password_confirmation' => '',
        ];

         session()->flash('status', 'Votre mot de passe as été modifier avec succées');
         return redirect()->back();
    }


    public function render()
    {
        return view('livewire.password-change-form');
    }
}
