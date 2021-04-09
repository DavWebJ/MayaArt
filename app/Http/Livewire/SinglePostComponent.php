<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\PostCategory;
use App\Models\User;

class SinglePostComponent extends Component
{

    public $slug;


    public function mount($slug)
    {
        $this->slug = $slug;

        
    }
    public function render()
    {
        $post = Post::with('postcategory','author')->where('slug',$this->slug)->firstOrFail();
        $otherposts = Post::with('postcategory')->where('id','!=',$post->id)->orderBy('post_category_id','desc')->inRandomOrder()->limit(4)->get();
        $category = PostCategory::all();
        $title = $this->slug;
        $postsCount = Post::count();
        $author = User::where('role_id',2)->first();

        return view('livewire.single-post-component',
        ['otherposts'=>$otherposts,
        'post'=>$post,
        'title'=>$title,
        'category'=>$category,
         'postsCount'=>$postsCount,
         'author'=>$author
         ] )->layout('layouts.app');
    }
}
