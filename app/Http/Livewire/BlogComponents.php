<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use App\Models\PostCategory;
use Livewire\WithPagination;

class BlogComponents extends Component
{


    public function render()
    {
        $lastpost =Post::latest('published_at')->first();
        $postsCount = Post::count();
        if(empty($lastpost))
        {
            $lastpost = null;
            $id = null;
            $postsCount = 0;
            $posts = null;
        }else
        {
            $id  = $lastpost->id;
            $posts = Post::with('postcategory','user')->where('id','!=',$id)->orderBy('created_at','DESC')->paginate(6);
        }
        
      // $posts = Post::with('postcategory','user')->where('id','!=',$id)->orderBy('created_at','DESC')->paginate(6);

        $category = PostCategory::with('posts')->get();
        
        $author = User::where('role_id',2)->first();

        return view('livewire.blog-components',
        [
            'lastpost' => $lastpost,
            'posts' => $posts,
            'category' => $category,
            'postsCount'=>$postsCount,
            'author'=>$author
        ])->layout('layouts.app');
    }
}
