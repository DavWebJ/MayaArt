<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class CategoryComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $category_slug;

    public function mount($category_slug)
    {
        $this->sorting = "default";
        $this->pagesize = 9;
        $this->category_slug = $category_slug;
    }

    public function render()
    {
        $lastproduct = Product::latest('created_at')->first();
        $id  = $lastproduct->id;
        
        $category = Category::all();
        $categories = Category::where('slug',$this->category_slug)->first();
        $categories_id = $categories->id;
        $categories_name = $categories->name;

        $products = Product::with('category')->where('id','!=',$id)->where('category_id','=',$categories_id)->paginate($this->pagesize);
     
        return view('livewire.category-component',
        [
            'lastproduct'=>$lastproduct,
            'products'=>$products,
            'category'=>$category,
            'categories_id'=> $categories_id,
            'categories_name' =>$categories_name
        ])->layout('layouts.app');
    }
}
