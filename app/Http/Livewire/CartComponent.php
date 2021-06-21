<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use App\Models\Option;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public $havecoupon;
    public $coupon;
    public $discount;
    public $subtotalAfterDiscount;
    public $totalAfterDiscount;
    public $promos = 0;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function remove($rowId)
    {
      
        Cart::instance('cart')->remove($rowId);
       $this->emitTo('cart-count-component','refreshComponent');
       $this->emitTo('cart-dynamique-component','refreshComponent');

    }

    public function increase($rowId)
    {
        
        $product = Cart::instance('cart')->get($rowId);
        $stock = $product->model->stock;
        if($product->qty  >= $stock)
        {
            Session::flash('warning', 'Pas assez de stock');
            Cart::instance('cart')->update($rowId,$product->qty);
        }else
        {
            $qty = $product->qty + 1;
            Cart::instance('cart')->update($rowId,$qty);
        }
       $this->emitTo('cart-count-component','refreshComponent');
        $this->emitTo('cart-dynamique-component','refreshComponent');


      
    }
    public function decrease($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        if($qty <= 0)
        {
            $qty = 0;
            Cart::instance('cart')->update($rowId,$qty);
        }else{
            Cart::instance('cart')->update($rowId,$qty);
        }
        $this->emitTo('cart-count-component','refreshComponent');
         $this->emitTo('cart-dynamique-component','refreshComponent');
        

    }

    public function saveForLater($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('save')->add($item->id,$item->name,1,$item->price)->associate(Product::class);
        $this->emitTo('cart-count-component','refreshComponent');
        $this->emitTo('cart-dynamique-component','refreshComponent');
        return redirect()->back();
        session()->flash('success','Ce produit as était sauvegarder pour plus tard ');
    }

    public function checkout()
    {

        if(Auth::check())
        {
            return redirect()->route('shipping.index');
        }
        else
        {
            return redirect()->route('login');
        }

    }

    public function prepareCheckout()
    {
        if(session()->has('coupon'))
        {
            session()->put('checkout',
            [
                'discount'=>$this->discount,
                'subtotal'=>$this->subtotalAfterDiscount,
                'total'=>$this->totalAfterDiscount,
            ]);
        }else
        {
            session()->put('checkout',
            [
                'discount'=>0,
                'subtotal'=>Cart::instance('cart')->subtotal(),
                'total'=>Cart::instance('cart')->total()
            ]);
        }
    }

    public function applyCoupon()
    {
       
        $this->countPromos();
        if($this->promos > 0)
        {
            session()->flash('warning','un produit de votre panier comporte déjà une promotion, vous ne pouvez pas cumuler d\' autres promotions');
            return;
        }else
        {
            $couponCode = Coupon::where('code',$this->coupon)->where('expiry_date','>=',Carbon::today())->where('cart_value','<=',Cart::instance('cart')->subtotal())->first();
            if(!$couponCode)
            {
                $coupon = Coupon::where('code',$this->coupon)->first();

                $cart_min = $coupon->cart_value;
                if(Cart::instance('cart')->subtotal() < $cart_min)
                {
                    session()->flash('warning','Votre panier n\' as pas atteint le montant minimum de '.$cart_min.' €');
                    return;
                }
                session()->flash('warning','Ce coupon n\ est plus valide ou as depasser sa date de validiter');
                return;

            }
            session()->put('coupon',
                [
                    'code' =>$couponCode->code,
                    'type' => $couponCode->type,
                    'value'=>$couponCode->value,
                    'cart_value'=>$couponCode->cart_value
                    
                ]
            );
            session()->flash('success','Le coupon as bien était appliquer au panier ! ');
        }


    }
    public function removeCoupon()
    {
        session()->forget('coupon');
        session()->flash('success','Le coupon as était supprimé avec succées! ');
    }
    public function calculateDiscount()
    {
        if(session()->has('coupon'))
        {
            if(session()->get('coupon') ['type'] == 'fixed')
            {
                $this->discount = session()->get('coupon') ['value'];
            }
            else
            {
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon') ['value'])/100;
            }
            $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount;
        }
    }

    public function destroy()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component','refreshComponent');
        $this->emitTo('cart-dynamique-component','refreshComponent');
        session()->flash('success','Votre panier as bien était vider !');
    }

    public function countPromos()
    {
        
        foreach (Cart::instance('cart')->content() as $item) {
            
            if($item->model->price_promos  > 0)
            {
                $this->promos++;
            }
            
        }

    }

    public function updated()
    {
        $this->countPromos();
    }

    public function render()
    {
        if(session()->has('coupon'))
        {
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value'])
            {
                session()->forget('coupon');
            }else
            {
                $this->calculateDiscount();
            }
        }
        $this->prepareCheckout();
        $this->countPromos();
        return view('livewire.cart-component',[
            'promos'=>$this->promos
        ])->layout('layouts.master');
    }
}
