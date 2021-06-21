<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Option;
use App\Models\Rating;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SingleProductComponent extends Component
{
    public $rating;
    public $comment;
    public $currentId;
    public $hideForm;
    public $slug;


    public function mount($slug)
    {
        $product  = Product::where('slug','=',$slug)->with('options')->firstOrFail();
        $product_id = $product->id;

        if(Auth::check())
        {
            $rating_unvalide = Rating::where('user_id', auth()->user()->id)->where('product_id', $product_id)->where('status',0)->first();
            $rating_valide = Rating::where('user_id', auth()->user()->id)->where('product_id', $product_id)->where('status',1)->first();
        }

        $this->slug = $slug;
      
    }

    

    public function deleteRate($id)
    {
        $rating = Rating::where('id', $id)->first();
        if ($rating && ($rating->user_id == auth()->user()->id)) {
            $rating->delete();
        }
        if ($this->currentId) {
            $this->currentId = '';
            $this->rating  = '';
            $this->comment = '';
            $this->hideForm = false;

        }
        Session::flash('success', 'Votre avis a bien été supprimé');
        return redirect()->route('shop.show',['slug'=>$this->slug]);
    }


    public function render()
    {
       
        $product = Product::with('category','options','ratings')->where('slug',$this->slug)->firstOrFail();
        $attributes = $product->options;
        $otherproduct = Product::with('category')->where('id','!=',$product->id)->inRandomOrder()->take(6)->get();
        $category = Category::all();
        $title = $this->slug;
        $rate  = Rating::where('product_id', $product->id)->where('status', 1)->with('user')->get();
   
        
        if($product && Auth::check())
        {
                $rating_unvalide = Rating::where('user_id', auth()->user()->id)->where('product_id', $product->id)->where('status',0)->first();
                $rating_valide = Rating::where('user_id', auth()->user()->id)->where('product_id', $product->id)->where('status',1)->first();
            
            return view('livewire.single-product-component',
                [
                    'product'=>$product,
                    'otherproduct'=>$otherproduct,
                    'category'=>$category,
                    'title'=>$title,
                    'rate'=>$rate,
                    'hideForm' => $this->hideForm,
                   'rating_unvalide'=>$rating_unvalide,
                   'rating_valide'=>$rating_valide,
                   'attributes'=>$attributes
           
                ])->layout('layouts.master');
            

        }else 
        {
           
            return view('livewire.single-product-component',
                [
                    'product'=>$product,
                    'otherproduct'=>$otherproduct,
                    'category'=>$category,
                    'title'=>$title,
                    'rate'=>$rate,
                     'attributes'=>$attributes
  
                ])->layout('layouts.master');
           
        }

        
    }
    
    public function removeFromCart($product_id)
    {
        $rows  = Cart::instance('cart')->content();
        $rowId = $rows->where('id', $product_id)->first()->rowId;
        Cart::instance('cart')->remove($rowId);
       $this->emitTo('cart-count-component','refreshComponent');
       $this->emitTo('cart-dynamique-component','refreshComponent');


    }

    public function addToCart($product_id)
    {
        
        $double =  Cart::instance('cart')->search(function ($cartItem, $rowId) use($product_id){
	        return $cartItem->id === $product_id;
        });
        if($double->isNotEmpty() )
        {
            return;
        }


        $product  = Product::where('id','=',$product_id)->with('options')->firstOrFail();
        $product_name = $product->name;

        if($product->price_promos != 0)
        {
            
            $product_price = $product->price - $product->price_promos;

        }else{

            $product_price = $product->price;
            
        }
        
        Cart::instance('cart')->add($product_id, $product_name,1,$product_price)->associate(Product::class);
        $this->emitTo('cart-count-component','refreshComponent');
        $this->emitTo('cart-dynamique-component','refreshComponent');
        return redirect()->back();
    
    }

    public function addToWishlist($product_id)
    {
        $product  = Product::where('id','=',$product_id)->with('options')->firstOrFail();
        $product_name = $product->name;

        $product_price = $product->price;
            
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate(Product::class);
        $this->emitTo('wish-list-count-component','refreshComponent');
        $this->emitTo('wishlist-dynamique','refreshComponent');
        return redirect()->back();
         
    }

    public function removeFromWishlist($product_id)
    {
        $rows  = Cart::instance('wishlist')->content();
        $rowId = $rows->where('id', $product_id)->first()->rowId;
         Cart::instance('wishlist')->remove($rowId);
        $this->emitTo('wish-list-count-component','refreshComponent');
        $this->emitTo('wishlist-dynamique','refreshComponent');
        return redirect()->back();
    }
}
