<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'prenom' => 'required|min:1',
            'nom'=>'required|min:1',
            'adresse' => 'required|min:1',
            'pays'=>'required',
            'ville' => 'required|min:1',
            'zip'=>'required|numeric',
            'email' => 'required|email',
        ]);
        $ship_is_diff = $request->input('ship_is_diff');
        $billing = new Billing();
        $billing->user_id = Auth::user()->id;
        $billing->prenom = $request->prenom;
        $billing->nom = $request->nom;
        $billing->email = $request->email;
        $billing->adresse = $request->adresse;
        $billing->ville = $request->ville;
        $billing->zip = $request->zip;
        $billing->pays = $request->pays;
        $billing->save();

        if($ship_is_diff == true)
        {
            $this->validate($request,[
                'shp_prenom' => 'required|string',
                'shp_nom' => 'required|string',
                'shp_email' => 'required|email',
                'shp_adresse' => 'required',
                'shp_ville' => 'required',
                'shp_zip' => 'required|numeric',
                'shp_pays' => 'required'
            ]);
            $shipping = new Shipping();
            $shipping->user_id = Auth::user()->id;
            $shipping->order_id = null;
            $shipping->prenom = $request->shp_prenom;
            $shipping->nom = $request->shp_nom;
            $shipping->email = $request->shp_email;
            $shipping->adresse = $request->shp_adresse;
            $shipping->ville = $request->shp_ville;
            $shipping->zip = $request->shp_zip;
            $shipping->pays = $request->shp_pays;
            $shipping->save();
        }

        return redirect()->route('checkout.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function show(Billing $billing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function edit(Billing $billing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Billing $billing)
    {
        $this->validate($request,[
            'user_id'=>'exists:users,id',
            'prenom' => 'required|min:1',
            'nom'=>'required|min:1',
            'adresse' => 'required|min:1',
            'pays'=>'required',
            'ville' => 'required|min:1',
            'zip'=>'required|numeric|min:2',
            'email' => 'required|email',
        ]);

        $billing = Billing::updateOrCreate([
            'user_id' => Auth::user()->id,
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' =>  Auth::user()->email,
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'zip' => $request->zip,
            'pays' => $request->pays,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Billing $billing)
    {
        //
    }
}
