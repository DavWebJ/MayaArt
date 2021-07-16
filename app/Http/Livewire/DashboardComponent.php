<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Billing;
use App\Models\Product;
use Livewire\Component;
use App\Models\Shipping;
use App\Models\Transaction;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\ShoppingcartServiceProvider;

class DashboardComponent extends Component
{
    public $savedWishList;




    public function remove($rowId)
    {
      
        Cart::instance('wishlist')->remove($rowId);
        $this->emitTo('wish-list-count-component','refreshComponent');
        $this->emitTo('wishlist-dynamique','refreshComponent');
        session()->flash('success','Ce produit as bien était retirer de votre liste !');


    }

    public function resetHard()
    {
        
        $user = User::where('id',Auth::user()->id)->first();
       Cart::instance('wishlist')->deleteStoredCart($user->email);
       Cart::instance('wishlist')->destroy();
        $this->emitTo('wish-list-count-component','refreshComponent');
        $this->emitTo('wishlist-dynamique','refreshComponent');
        session()->flash('success','Votre liste as bien était supprimer !');
    }

    public function moveToCart($rowId)
    {
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate(Product::class);
        $this->emitTo('cart-count-component','refreshComponent');
        $this->emitTo('cart-dynamique-component','refreshComponent');
        $this->emitTo('wish-list-count-component','refreshComponent');
        $this->emitTo('wishlist-dynamique','refreshComponent');
        session()->flash('success','Ce produit as bien était ajouter a votre panier !');
    }

    public function readMessage($id)
    {
        $message =  Notification::where('user_id',Auth::user()->id)->where('id',$id)->first();
        $message->update(['read'=>1]);
        return redirect()->route('notification.show',[$message->id]);

    }

    public function save()
    {
        $user = User::where('id',Auth::user()->id)->first();
        Cart::instance('wishlist')->store($user->email);
        session()->flash('success','Votre liste de favoris as bien étais sauvegarder !');

    }
    public function restoreWishList()
    {
        $user = User::where('id',Auth::user()->id)->first();
       $list = Cart::instance('wishlist')->restore($user->email);
       $listed = DB::table('shoppingcart')
       ->where('identifier',$user->email)
       ->first();
       if($listed)
       {
            $this->savedWishList = $list;
            return true;
       }else
       {
           return false;
       }

    }


    public function render()
    {
        $this->restoreWishList();
        $restored = false;
        if($this->restoreWishList())
        {
            $restored = true;
        }
        $order = Order::where('user_id',Auth::user()->id)->with('transaction')->get();
        $transaction = Transaction::where('user_id',Auth::user()->id)->get();
        $user = User::where('id',Auth::user()->id)->with('notifications')->first();
        $new_notifications =  Notification::where('user_id',$user->id)->where('read',0)->get();
        $new =  Notification::where('user_id',$user->id)->where('read',0)->count();
        $old_notifications =  Notification::where('user_id',$user->id)->where('read',1)->get();
        $billing = Billing::where('user_id',Auth::user()->id)->first();
        $shipping = Shipping::where('user_id',Auth::user()->id)->first();

        
        return view('livewire.dashboard-component',
        [
            'user'=>$user,
            'order'=>$order,
            'transaction'=>$transaction,
            'new_notifications'=>$new_notifications,
            'old_notifications'=>$old_notifications,
            'restored'=>$restored,
            'billing'=>$billing,
            'shipping' => $shipping,
            'transaction'=>$transaction

        ]
        )->layout('layouts.master');
    }
}
