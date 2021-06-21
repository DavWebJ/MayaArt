<?php

namespace App\Http\Livewire;

use App\Models\Billing;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ChangeBillingComponent extends Component
{

    public $adresse;
    public $pays;
    public $ville;
    public $zip;


    protected $rules = [

            'adresse' => 'required|min:1',
            'pays'=>'required',
            'ville' => 'required|min:1',
            'zip'=>'required|numeric',

    ];



    public function createbilling()
    {
        $this->validate();
        Billing::updateOrCreate(
             ['user_id' =>Auth::user()->id],
             [
                'prenom' => Auth::user()->prenom,
                'nom' => Auth::user()->name,
                'user_id' => Auth::user()->id,
                'adresse' => $this->adresse,
                'pays'=>$this->pays,
                'ville' => $this->ville,
                'zip'=>$this->zip,
                'email' => Auth::user()->email
             ]
        );

        return redirect()->route('dashboard');



    }

    public function render()
    {
        $billing = Billing::where('user_id',Auth::user()->id)->first();
        return view('livewire.change-billing-component',
        [
            'billing' =>$billing

        ]
    );
    }
}
