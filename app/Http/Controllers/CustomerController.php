<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Coupon;
use App\Models\Option;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CustomerController extends Controller
{
    public function __construct()
    {
       
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
        return view('dashboard',
            [
                'orders_encours'=>$orders_encours,
                'orders_preparer'=>$orders_preparer,
                'orders_expedier'=>$orders_expedier,
                'orders_annuler'=>$orders_annuler
            
            ]
        );
    }

    public function storeCoupon(Request $request)
    {
        $code = $request->get('coupon');
        $coupon = Coupon::where('code',$code)->first();
        if($coupon == null)
        {
            return  redirect()->back()->with('error','Ce code promo n\'est pas valide');
        }
        $remise = $coupon->percent;

        $subtotal = Cart::subtotal();
        
        $applyRemise = $subtotal * $remise  / 100;

        if(!$coupon)
        {
           return  redirect()->back()->with('error','Le code promo est invalide !');
        }else
        {
            $request->session()->put('coupon',
            [
                'code' =>$coupon->code,
                'remise' =>$coupon->discount(Cart::subtotal()),
                
            ]
            );
            return  redirect()->back()->with('success','Le code promo a été appliqué avec succès !');
        }
    }

    public function destroyCoupon()
    {
        request()->session()->forget('coupon');
         return  redirect()->back()->with('success','Le code promo a été retiré avec succès !');
    }

    // public function store(Request $request)
    // {
    //     $product_id = $request->product_id;
    //     $option = $request->attr;

    //     $double =  Cart::search(function ($cartItem, $rowId) use($product_id){
	//         return $cartItem->id === $product_id;
    //     });
    //     if($double->isNotEmpty() )
    //     {
    //         Session::flash('success', 'Cet article est déjà dans votre panier');
    //         return redirect()->route('customer.cart');
    //     }

    //     if(!empty($option))
    //     {
    //         $attributes = Option::find($option);
    //         $name_option = $attributes->option;
    //         $option_price = $attributes->option_price;
           
    //     }

    //     $product  = Product::where('id','=',$product_id)->with('options')->firstOrFail();
    //     $product_id = $product->id;
    //     $product_name = $product->name;

    //     if($product->price_promos != 0)
    //     {
            
    //         if(!empty($option))
    //         {
    //             $product_price = $product->price +  $option_price - $product->price_promos ;
      
    //         }
    //         else
    //         {
    //             $product_price = $product->price - $product->price_promos;
    //         }

            
            
    //     }else{

    //         if(!empty($option))
    //         {
    //             $product_price = $product->price + $option_price;
                
    //         }
    //         else
    //         {
    //             $product_price = $product->price;
    //         }

            
    //     }
        
        
       

    //     if($option)
    //     {

    //         Cart::add($product_id, $product_name,1,$product_price,['name_option'=>$name_option  ,'option_price'=>$option_price])->associate(Product::class);
           
            
    //     }else{
    //          Cart::add($product_id, $product_name,1,$product_price)->associate(Product::class);
    //     }
    
       
        
    //     Session::flash('success', 'Cet article a bien été ajouté à votre panier !');
    //      return redirect()->route('shop');
    // }

}
