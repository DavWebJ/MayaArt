<?php

namespace App\Http\Controllers;

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
        $billing = Billing::where('id',Auth::user()->id)->with('shipping')->first();
        return view('customer.shipping',compact('billing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = auth()->user()->id;
        $shipping = Shipping::with('user')->where('user_id',$id)->first();
        if($shipping)
        {
            return view('customer.shipping',compact('shipping'));
        }else{
            return view('customer.shipping');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $this->validate($request,
        // [
        //     'shipping_adress'=>'required',
        //     'shipping_zip'=>'required|numeric',
        //     'shipping_city'=>'required',
        //     'billing_adress'=>'required',
        //     'billing_zip'=>'required|numeric',
        //     'billing_city'=>'required',

        // ]);
        $ship_is_diff = $request->input('ship_is_diff');
        // $shipping = Shipping::updateOrCreate([
        //     'user_id'=> auth()->user()->id,
        //     'shipping_numero' => $request->shipping_numero,
        //     'shipping_adress' => $request->shipping_adress,
        //     'shipping_zip' => $request->shipping_zip,
        //     'shipping_city' => $request->shipping_city,
        //     'billing_numero' => $request->billing_numero,
        //     'billing_adress' => $request->billing_adress,
        //     'billing_zip' => $request->billing_zip,
        //     'billing_city' => $request->billing_city,

        // ]);

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
