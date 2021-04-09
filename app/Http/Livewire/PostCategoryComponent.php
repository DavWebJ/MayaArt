<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\PostCategory;
use Livewire\Component;

class PostCategoryComponent extends Component
{
    
    public $pagesize;
    public $postcategory_slug;

    public function mount($postcategory_slug)
    {
       
        $this->pagesize = 9;
        $this->postcategory_slug = $postcategory_slug;
    }
    public function render()
    {
        $lastpost = Post::latest('created_at')->first();
        $id  = $lastpost->id;
        
        $postcategory = PostCategory::all();
        $postcategories = PostCategory::where('slug',$this->postcategory_slug)->first();
        $postcategories_id = $postcategories->id;
        $postcategories_name = $postcategories->name;
        $postsCount = Post::count();
        $posts = Post::with('postcategory')->where('id','!=',$id)->where('post_category_id','=',$postcategories_id)->paginate($this->pagesize);
        return view('livewire.post-category-component',
        [
            'lastpost'=>$lastpost,
            'posts'=>$posts,
            'postcategory'=>$postcategory,
            'postsCount'=>$postsCount,
            'postcategories_id'=>$postcategories_id,
            'postcategories_name'=>$postcategories_name
        ]
    )->layout('layouts.app');
    }
}
