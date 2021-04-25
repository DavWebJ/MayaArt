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
        $otherproduct = Product::with('category')->where('id','!=',$product->id)->orderBy('category_id','desc')->inRandomOrder()->limit(2)->get();
        $categories = Category::all();
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
                    'categories'=>$categories,
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
                    'categories'=>$categories,
                    'title'=>$title,
                    'rate'=>$rate,
                     'attributes'=>$attributes
  
                ])->layout('layouts.master');
           
        }

        
    }
}
