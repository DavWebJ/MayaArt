<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Coupon;
use App\Models\Option;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
       $this->middleware(['auth:sanctum','verified']);
    }

    // public function payementSuccess()
    // {
    //     return view('customer.checkout-success');
    // }

    public function dashboard()
    {
        $orders_encours = Order::where('user_id',auth()->user()->id)->where('status','en cours')->orderBy('order_at','DESC')->get();
        $orders_preparer = Order::where('user_id',auth()->user()->id)->where('status','preparer')->orderBy('order_at','DESC')->get();
        $orders_expedier = Order::where('user_id',auth()->user()->id)->where('status','expedier')->orderBy('order_at','DESC')->get();
        $orders_annuler = Order::where('user_id',auth()->user()->id)->where('status','annuler')->orderBy('order_at','DESC')->get();
        $checkuser = Auth::check();
        if($checkuser)
        {
            $id = Auth::user()->id;
        }else
        {
            abort(404);
        }
        $user = User::where('id',$id)->with('shipping','orders')->first();
        if($user)
        return view('dashboard',
            [
                'orders_encours'=>$orders_encours,
                'orders_preparer'=>$orders_preparer,
                'orders_expedier'=>$orders_expedier,
                'orders_annuler'=>$orders_annuler,
                'user'=>$user
            
            ]
        );
    }


}
