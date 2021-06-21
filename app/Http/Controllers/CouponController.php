<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin']);


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon = Coupon::all();
        return view('admin.coupon.index',compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.coupon.create');
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
            'code'=>'bail|required|unique:coupons,code',
            'type'=>'required',
            'value' => 'bail|required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'

        ]);

        
        $coupons = Coupon::create([
            'code' => $request->code,
            'type' => $request->type,
            'value' => $request->value,
            'cart_value' => $request->cart_value,
            'expiry_date'=>$request->expiry_date

        ]);

        $coupons->save();

        $request->session()->flash('success', 'Le code promo as était créé avec succées !');
        return redirect()->route('coupon.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $this->validate($request,
        [
            'code'=>'required',
            'type'=>'required',
            'value' => 'bail|required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'
        ]);


            $code = $request->input('code');
            $type = $request->input('type');
            $value = $request->input('value');
            $cart_value = $request->input('cart_value');
            $exipy_date = $request->input('expiry_date');

   

            $coupon->code = $code;
            $coupon->type = $type;
            $coupon->value = $value;
            $coupon->cart_value = $cart_value;
            $coupon->expiry_date = $exipy_date;
            $coupon->save();

        Session::flash('success', 'Ce code promo a bien été modifié !');
        return redirect('admin/coupon');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
