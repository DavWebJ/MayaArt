<?php

namespace App\Http\Controllers;

use DateTime;
use Stripe\Stripe;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
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
       
 
        if(Cart::count() <= 0)
        {
            return redirect()->route('shop');
        }
        $user = Auth::user();
        $shipping = Shipping::where('user_id',$user->id)->first();
        Stripe::setApiKey('sk_test_51IYXNDKSfoIUPZH8jAxqtNUUVxe0lQhfGSvXgNUrmnf0K0AFa3V9w1jcQJmrr7w5qR1KeUPU4BZ7uftVL00rkyxt0060ruyHIc');
        if(request()->session()->has('coupon'))
        {
            if ( IsFreeShipping() ){
                $amount = floatval(Total() - request()->session()->get('coupon')['remise']) * 100;
         
            }
            else
            {
                $amount = floatval(TotalTTC() - request()->session()->get('coupon')['remise']) * 100;
      
            }
                                    
         
        }
        else
        {
            if ( IsFreeShipping() ){
                $amount = floatval(Total() * 100);
            }else
            {
                $amount = floatval(TotalTTC() * 100);
            }
           
        }

      
        
        $intent = PaymentIntent::create([
        'amount' => round($amount),
        'currency' => 'EUR',
        'metadata' => [
            'user_id'=> $user->id,
            'prenom'=> $user->prenom,
            'nom'=>  $user->name,
            'email' => $user->email,
            'adresse de livraison' => $shipping->shipping_numero .', '. $shipping->shipping_adress.' '. $shipping->shipping_zip .' à  '.$shipping->shipping_city 
        ],
        ]);

        $clientSecret = Arr::get($intent,'client_secret');
        if($this->checkIfNotInStock())
        {
             
             Session::flash('error', 'Désolé, le stock est insufisant !');
             Cart::destroy();
             return redirect()->route('shop');
        }else
        {
            
            return view('customer.checkout',
                [
                    'clientSecret'=>$clientSecret,
                    'shipping' => $shipping
                ]
            );
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if($this->checkIfNotInStock())
       {
            Session::flash('error', 'Désolé, le stock est insufisant !');
            Cart::destroy();
            return response()->json(['error'=>false], 400);
       }else{
            $data = $request->json()->all();
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->transaction_id = $data['payment_intent']['id'];
            $total = $data['payment_intent']['amount'];
            $order->total = $total;
            $order->order_at = (new DateTime())
            ->setTimestamp($data['payment_intent']['created'])
            ->format('Y-m-d H:i:s');
            $order->status = 'en cours';
            $products = [];
            $i = 0;
            foreach (Cart::content() as $product) {
                $products['produit_' . $i][] = $product->model->slug;
                 $products['produit_' . $i][] = $product->model->price;
                  $products['produit_' . $i][] = $product->qty;
                  $i++;
            }
            $order->products = serialize($products);
            $order->save();

            if($data['payment_intent']['status'] == 'succeeded')
            {
                $this->updateStock();
                Cart::destroy();
                //Session::flash('success', 'Votre commande a été traitée avec succès');
                return response()->json(['success'=>'Payment Intent Succeeded']);
                $this->payementSuccess();
            }else
            {
                
                return response()->json(['error'=>'Payment Intent Canceled']);
            }
       }

        
    }

    public function payementSuccess()
    {
        Session::flash('success', 'Merci ! Votre commande a été réglée avec succès');
        return view('customer.checkout-success');
    }

    public function payementError()
    {
            
        Session::flash('error', 'Votre paiement a été refusé, veuillez contacter votre banque ou utiliser un autre moyen de paiement');
        
        return view('customer.checkout-error');
        
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    private function checkIfNotInStock()
    {
        foreach (Cart::content() as $item ) {
            $product = Product::find($item->model->id);
           if($product->stock < $item->qty)
           {
               return true;
           }
        }
        return false;
    }
    private function updateStock()
    {
        foreach (Cart::content() as $item ) {
            $product = Product::find($item->model->id);
            $product->update(['stock' => $product->stock - $item->qty]);
        }
        
    }


}
