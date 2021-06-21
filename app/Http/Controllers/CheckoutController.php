<?php

namespace App\Http\Controllers;

use DateTime;
use Exception;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\OrderItem;
use Stripe\PaymentIntent;
use App\Models\Transaction;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Cartalyst\Stripe\Stripe;
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
        return view('customer.checkout-component');
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
        //Stripe::setApiKey('sk_test_51IEul1C9XhMP61c89ogzQ1vClIgqBL7wiwNSA2ljux8iZiUcsWrIJGeAOxO3VplRzfkMxR5tMQcU8TZ6O3GMjPhL00IRfWthR6');
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

    public function PaiementAction(Request $request)
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
        $ship_is_diff = $request->ship_is_diff;
        if($this->checkIfNotInStock())
       {
            Cart::destroy();
            session()->flash('error', 'Désolé, un de vos produit est indisponible ou n\ est plus en stock, veuillez verifier votre panier!');
            return redirect()->back();
       }
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->discount = session()->get('checkout')['discount'];
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->total = session()->get('checkout')['total'];
        $order->order_at = Carbon::now();
        $order->prenom = $request->prenom;
        $order->nom = $request->nom;
        $order->email = $request->email;
        $order->adresse = $request->adresse;
        $order->ville = $request->ville;
        $order->zip = $request->zip;
        $order->pays = $request->pays;
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
        if($ship_is_diff == 1)
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
            $shipping->order_id = $order->id;
            $shipping->prenom = $request->shp_prenom;
            $shipping->nom = $request->shp_nom;
            $shipping->email = $request->shp_email;
            $shipping->adresse = $request->shp_adresse;
            $shipping->ville = $request->shp_ville;
            $shipping->zip = $request->shp_zip;
            $shipping->pays = $request->shp_pays;
            $shipping->save();
        }

        $stripe = Stripe::make(env('STRIPE_SECRET_KEY'));
        try
        {
            $token = $stripe->tokens()->create([
                'card' => [
                    'number'=> $request->card_n,
                    'exp_month' => $request->mois,
                    'exp_year' =>$request->annees,
                    'cvc' => $request->cvc
                ]
            ]);
            if(!isset($token['id']))
            {
                session()->flash('error', 'Désolé, une erreur s\'est produite , le token stripe ne s\est pas générer correctement !');
                $this->payementError();
            }
            $customer = $stripe->customers()->create([
                'name' => $request->nom . ' '. $request->prenom,
                'email' => $request->email,
                'address' =>[
                    'adresse' => $request->adresse,
                    'ville' => $request->ville,
                    'departement' => $request->zip,
                    'pays' => $request->pays,
                ],
                'shipping' => [
                    'name' => $request->nom . ' '. $request->prenom,
                    'address' =>[
                        'adresse' => $request->adresse,
                        'ville' => $request->ville,
                        'departement' => $request->zip,
                        'pays' => $request->pays,
                    ],
                ],
                'source' =>$token['id']
            ]);
            $charge = $stripe->charges()->create([
                'customer' => $customer['id'],
                'currency'=>'EUR',
                'amount'=> session()->get('checkout')['total'],
                'description' => 'paiement pour  la commande numèro' . $order->id
            ]);

            if($charge['status'] == 'succeeded')
            {
                $this->makeTransaction($order->id,'valider');
                $this->resetCart();
            }else
            {
                
                session()->flash('error', 'Oups ! , une erreur s\'est produite ,votre paiement as été refuser,  veuillez vérifier vos information bancaire ou utiliser un autre moyent de paiement !');
                $this->payementError();
   
            }
        } catch(Exception $e)
        {
             session()->flash('error',$e->getMessage());
             $this->payementError();
        }

    }

    public function resetCart()
    {
        
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
        $this->payementSuccess();
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

    public function makeTransaction($order_id,$status)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order_id;
        $transaction->status = $status;
        $transaction->save();
    }


    private function updateStock()
    {
        foreach (Cart::content() as $item ) {
            $product = Product::find($item->model->id);
            $product->update(['stock' => $product->stock - $item->qty]);
        }
        
    }


}
