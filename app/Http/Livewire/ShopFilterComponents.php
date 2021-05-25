<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopFilterComponents extends Component
{
    public $perPage = 8;
    public $search;
    public $sorting;
    protected $updatesQueryString = ['search'];
    public $min_price;
    public $max_price;

    
    public function mount()
    {
        $this->search = request()->query('search', $this->search);
        $this->perPage = 8;
        $this->sorting = "default";
        $this->min_price = 0;
        $this->max_price = 200;
    }

     public function loadmore()
    {
        $this->perPage += 10;
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
    }

    public function removeFromWishlist($product_id)
    {
        $rows  = Cart::instance('wishlist')->content();
        $rowId = $rows->where('id', $product_id)->first()->rowId;
         Cart::instance('wishlist')->remove($rowId);
        $this->emitTo('wish-list-count-component','refreshComponent');
    }

    public function render()
    {
        $products = Product::with('category')->whereBetween('price',[$this->min_price,$this->max_price])->orderBy('created_at', 'DESC')->take($this->perPage)->get();
        if($this->sorting == 'date')
        {

            $products = Product::with('category')->whereBetween('price',[$this->min_price,$this->max_price])->orderBy('created_at', 'DESC')->take($this->perPage)->get();
        }
        else if($this->sorting == 'price_asc')
        {

            $products = Product::with('category')->whereBetween('price',[$this->min_price,$this->max_price])->orderBy('price', 'ASC')->take($this->perPage)->get();
        }        
        else if($this->sorting == 'price_desc')
        {

            $products = Product::with('category')->whereBetween('price',[$this->min_price,$this->max_price])->orderBy('price', 'DESC')->take($this->perPage)->get();
        }
        else if($this->sorting == 'default')
        {

            $products = Product::with('category')->whereBetween('price',[$this->min_price,$this->max_price])->orderBy('created_at', 'DESC')->take($this->perPage)->get();
        }        
        else
        {
            
           $products = Product::with('category')->whereBetween('price',[$this->min_price,$this->max_price])->orderBy('created_at', 'DESC')->take($this->perPage)->get();
        }
        $category = Category::with('products')->get();
        $products_count = Product::all()->count();
        return view('livewire.shop-filter-components',[
            'category' => $category,
             'products_count' =>$products_count,
            'products' => $this->search === null ? 
            $products :
            Product::where('name', 'like', '%' . $this->search . '%')->whereBetween('price',[$this->min_price,$this->max_price])->get()
        ])->layout('layouts.master');
    }

   




}
