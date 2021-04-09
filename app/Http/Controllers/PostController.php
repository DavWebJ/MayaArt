<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
        public function __construct()
    {
        $this->middleware(['admin']);


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('postcategory')->get();
        $categories = PostCategory::all();
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PostCategory::all();
        return view('admin.post.create',compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'title'=>'required|unique:posts,title',
            'category'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'alt'=>'required',
            'meta'=>'required',
            'content'=>'required',
        ]);

        $posts = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title,'-'),
            'image' => 'image',
            'alt'=>$request->alt,
            'post_category_id' => $request->category,
            'user_id'=> auth()->user()->id,
            'meta'=> $request->meta,
            'published_at'=> Carbon::now()
        ]);

      
        if($request->hasFile('image'))
        {

            $file = $request->file('image');

            // Get filename with extension
            $filenameWithExt = $file->getClientOriginalName();

            // Get file path
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Remove unwanted characters
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);

            // Get the original image extension
            $extension = $file->getClientOriginalExtension();

            // Create unique file name
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $file->move('storage/blog/',$fileNameToStore);
            $posts->image = 'storage/blog/' .$fileNameToStore;
            
        }
        $posts->save();
        $request->session()->flash('success', 'Votre article a bien été publié');
        return redirect('admin/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, $slug)
    {
        return view('admin.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = PostCategory::all();
        return view('admin.post.edit',compact(['post','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
         $this->validate($request,
        [
            'content'=>'required',
        ]);


            $title = $request->input('title');
            $content = $request->input('content');
            $alt = $request->input('alt');
            $slug = Str::slug($title,'-');
            $meta = $request->input('meta');
   

            $post->title = $title;
            $post->content = $content;
            $post->alt = $alt;
            $post->slug = $slug;
            $post->post_category_id = $request->category;
            $post->meta = $meta;
            $post->published_at = Carbon::now();

        if($request->hasFile('image'))
        {

            $file = $request->file('image');

            // Get filename with extension
            $filenameWithExt = $file->getClientOriginalName();

            // Get file path
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Remove unwanted characters
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);

            // Get the original image extension
            $extension = $file->getClientOriginalExtension();

            // Create unique file name
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $file->move('storage/blog/',$fileNameToStore);
            $post->image = 'storage/blog/' .$fileNameToStore;
            $post->save();
        }
        $post->save();

        Session::flash('success', 'Cet article a bien été modifié');
        return redirect('admin/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post)
        {
            if(file_exists(public_path($post->image)))
            {
                unlink(public_path($post->image));
            }

            $post->delete();
            Session::flash('success', 'Cet article a bien été supprimé');
            return redirect('admin/post');
        }
    }
}
