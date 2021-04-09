<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostCategoryController extends Controller
{
        public function __construct()
    {
        $this->middleware(['admin']);


    }
   public function index()
    {
        $postcategories = PostCategory::all();
        return view('admin.postcategory.index',compact('postcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.postcategory.create');
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
            'name'=>'required|unique:post_categories,name',
            
        ]);

        $postcategory = PostCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name,'-'),
        ]);

        $request->session()->flash('success', 'La catégorie blog a bien été créée');
        return redirect()->route('postcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategory $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategory $postcategory)
    {
        return view('admin.postcategory.edit',compact('postcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostCategory $postcategory)
    {
        $this->validate($request,
        [
            'name'=>"required|unique:post_categories,name,$postcategory->name",

        ]);


            $name = $request->input('name');
            $slug = Str::slug($name,'-');
 

            $postcategory->name = $name;
            $postcategory->slug = $slug;



        $postcategory->save();

        Session::flash('success', 'La catégorie a bien été modifiée');
        return redirect('admin/postcategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategory $postcategory)
    {
        if($postcategory)
        {
            $postcategory->delete();
            Session::flash('success', 'La catégorie a bien été supprimée');
            return redirect('admin/postcategory');
        }

    }
}
