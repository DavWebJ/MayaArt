<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Billing;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $id =Auth::user()->id;
        $shipping = Shipping::with('user')->where('user_id',$id)->first();
        $billing = Billing::where('user_id',$id)->first();
        return view('customer.shipping',compact('billing','shipping'));
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

        $ship_is_diff = $request->input('ship_is_diff');
        $billing = Billing::where('user_id',Auth::user()->id)->first();

        if($ship_is_diff == true)
        {
            $this->validate($request,[
                'prenom' => 'required|string',
                'nom' => 'required|string',
                'email' => 'required|email',
                'adresse' => 'required',
                'ville' => 'required',
                'zip' => 'required|numeric',
                'pays' => 'required'
            ]);
            Shipping::updateOrCreate(
                ['user_id' =>Auth::user()->id],
                [
                    'user_id' => Auth::user()->id,
                    'prenom' => $request->shp_prenom,
                    'nom' => $request->shp_nom,
                    'email' => Auth::user()->email,
                    'adresse' => $request->shp_adresse,
                    'ville' => $request->shp_ville,
                    'zip' => $request->shp_zip,
                    'pays' => $request->shp_pays
                ]
            );
        }else
        {
            if($billing)
            {
                Shipping::updateOrCreate(
                    ['user_id' =>Auth::user()->id],
                    [
                        'user_id' => Auth::user()->id,
                        'prenom' => $billing->prenom,
                        'nom' => $billing->nom,
                        'email' => $billing->email,
                        'adresse' => $billing->adresse,
                        'ville' => $billing->ville,
                        'zip' => $billing->zip,
                        'pays' => $billing->pays
                    ]
                );
            }else
            {
                $billing = Billing::create([
                        'user_id' => Auth::user()->id,
                        'prenom' => $request->prenom,
                        'nom' => $request->nom,
                        'email' => Auth::user()->email,
                        'adresse' => $request->adresse,
                        'ville' => $request->ville,
                        'zip' => $request->zip,
                        'pays' => $request->pays
                ]);
                
                    Shipping::updateOrCreate(
                    ['user_id' =>Auth::user()->id],
                    [
                        'user_id' => Auth::user()->id,
                        'prenom' => $billing->prenom,
                        'nom' => $billing->nom,
                        'email' => $billing->email,
                        'adresse' => $billing->adresse,
                        'ville' => $billing->ville,
                        'zip' => $billing->zip,
                        'pays' => $billing->pays
                    ]
                );
            }

            return redirect()->route('customer.checkout');
        }

        return redirect()->route('customer.checkout');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipping $shipping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        //
    }
}
