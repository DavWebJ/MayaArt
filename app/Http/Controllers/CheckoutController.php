<?php

namespace App\Http\Controllers;

use DateTime;
use Exception;
use IdGenerator;
use Stripe\Stripe;
use App\Models\Order;
use App\Models\Billing;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\OrderItem;
use Stripe\PaymentIntent;
use App\Models\Transaction;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;


class CheckoutController extends Controller
{
    public function __construct()
    {
         $this->middleware(['auth:sanctum','verified']);

    }

    public function checkout()
    {
  
        if(Cart::instance('cart')->count() <= 0)
        {
            return redirect()->route('shop');
        }
        $user = Auth::user();
         $billing = Billing::where('user_id',$user->id)->first();
        $shipping = Shipping::where('user_id',$user->id)->first();
        Stripe::setApiKey('sk_test_51IEul1C9XhMP61c89ogzQ1vClIgqBL7wiwNSA2ljux8iZiUcsWrIJGeAOxO3VplRzfkMxR5tMQcU8TZ6O3GMjPhL00IRfWthR6');
        $intent = PaymentIntent::create([
        'amount' => round(session()->get('checkout')['total']) * 100,
        'currency' => 'EUR',
        'metadata' => [
            'user_id'=> $user->id,
            'prenom'=> $billing->prenom,
            'nom'=>  $billing->nom,
            'email' => $user->email,
             'adresse de facturation' =>'adresse: '. $billing->adresse .', '. $billing->ville.' ,'. $billing->zip .' pays:  '.$billing->pays ,
             'adresse de livraison' =>'Nom:  '.$shipping->nom. 'Prénom:  ' . $shipping->prenom .', adresse: '. $shipping->adresse .', '. $shipping->ville. ', '. $shipping->zip .' pays:  '.$shipping->pays
        ],
        ]);

        $clientSecret = Arr::get($intent,'client_secret');
        if($this->checkIfNotInStock())
        {
             
             Session::flash('error', 'Désolé,un produit de votre panier  n\'est plus en stock !');
             Cart::destroy();
             return redirect()->route('shop');
        }
        return view('customer.checkout-component',[
             'clientSecret'=>$clientSecret,
             'shipping' => $shipping,
             'billing' => $billing
        ]);
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
            $order->order_at = Carbon::now();
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
        $order = Order::where('user_id',Auth::user()->id)->latest()->first();
        $transaction = Transaction::create([

            'user_id' => Auth::user()->id,
            'order_id' => $order->id,
            'status' => 'valider',
            'transaction_id' => 'ID-'. Str::random(30)
        ]);
                $transaction->save();
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
        Session::flash('success', 'Merci ! Votre commande a été réglée avec succès');
        return view('customer.checkout-success');
    }

    public function payementError()
    {

        Session::flash('error', 'Votre paiement a été refusé, veuillez contacter votre banque ou utiliser un autre moyen de paiement');
        
        return view('customer.checkout-error');
        
    }

    public function PaiementAction(Request $request)
    {
       
         if($this->checkIfNotInStock())
       {
            Cart::destroy();
            session()->flash('error', 'Désolé, un de vos produit est indisponible ou n\ est plus en stock, veuillez verifier votre panier!');
            return redirect()->back();
       }

        $data = $request->json()->all();
            $user = Auth::user();
            $this->updateStock();
            $billing = Billing::where('user_id',$user->id)->first();
            $shipping = Shipping::where('user_id',$user->id)->first();
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->billing_id = $billing->id;
            $order->shipping_id = $shipping->id;
            $order->discount = session()->get('checkout')['discount'];
            $order->subtotal = session()->get('checkout')['subtotal'];
            $order->total = session()->get('checkout')['total'];
            $order->order_at = Carbon::now();
            $order->prenom = $user->prenom;
            $order->nom = $user->name;
            $order->email = $user->email;
            $order->adresse = $billing->adresse;
            $order->ville = $billing->ville;
            $order->zip = $billing->zip;
            $order->pays = $billing->pays;
            $order->status = 'en cours';
            $order->is_shipping_different = 0;
            $order->save();
                foreach (Cart::instance('cart')->content() as $item) 
                {
                    $orderItem = new OrderItem();
                    $orderItem->product_id = $item->id;
                    $orderItem->price = $item->price;
                    $orderItem->qty = $item->qty;
                    $orderItem->order_id = $order->id;
                    $orderItem->save();
                }

            if($data['payment_intent']['status'] == 'succeeded')
            {
                $this->payementSuccess();

            }else
            {
                 return response()->json(['error'=>'Payment Intent Canceled']);
                session()->flash('error', 'Oups ! , une erreur s\'est produite ,votre paiement as été refuser,  veuillez vérifier vos information bancaire ou utiliser un autre moyent de paiement !');
                $this->payementError();
            }
    

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


    public function resetCart()
    {
        
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    private function updateStock()
    {
        foreach (Cart::content() as $item ) {
            $product = Product::find($item->model->id);
            $product->update(['stock' => $product->stock - $item->qty]);
        }
        
    }


}


