<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;

class ChangeShippingComponent extends Component
{
    public $adresse;
    public $pays;
    public $ville;
    public $zip;
    public $prenom;
    public $nom;

    protected $rules = [
            'prenom'=>'required|min:2',
            'nom' =>'required|min:2',
            'adresse' => 'required|min:1',
            'pays'=>'required',
            'ville' => 'required|min:1',
            'zip'=>'required|numeric',

    ];

    public function createshipping()
    {
        $this->validate();
        Shipping::updateOrCreate(
             ['user_id' =>Auth::user()->id],
             [
                'prenom' => $this->prenom,
                'nom' => $this->nom,
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
        $shipping = Shipping::where('user_id',Auth::user()->id)->first();
        return view('livewire.change-shipping-component',
        [
            'shipping' => $shipping
        ]
    );
    }
}
