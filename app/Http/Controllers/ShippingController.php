<?php

namespace App\Http\Controllers;

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
        return view('customer.shipping');
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

        $this->validate($request,
        [
            'shipping_adress'=>'required',
            'shipping_zip'=>'required|numeric',
            'shipping_city'=>'required',
            'billing_adress'=>'required',
            'billing_zip'=>'required|numeric',
            'billing_city'=>'required',

        ]);

        $shipping = Shipping::updateOrCreate([
            'user_id'=> auth()->user()->id,
            'shipping_numero' => $request->shipping_numero,
            'shipping_adress' => $request->shipping_adress,
            'shipping_zip' => $request->shipping_zip,
            'shipping_city' => $request->shipping_city,
            'billing_numero' => $request->billing_numero,
            'billing_adress' => $request->billing_adress,
            'billing_zip' => $request->billing_zip,
            'billing_city' => $request->billing_city,

        ]);

        $shipping->save();
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
