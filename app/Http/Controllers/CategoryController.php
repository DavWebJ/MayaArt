<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
        public function __construct()
    {
        $this->middleware(['admin']);


    }
  public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name'=>'required|unique:categories,name',
            'color'=>'required|unique:categories,color',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name,'-'),
            'color'=>$request->color,
            'image'=>'image'
        ]);

        $image = $request->file('image');

        $input['imagename'] = time().'.'.$image->extension();

        $destinationPath = public_path('storage/category');

        $img = Image::make($image->path());

        $img->resize(200, 200, function ($constraint) {

            $constraint->aspectRatio();

        })->save($destinationPath.'/'.$input['imagename']);


        //$image->move('storage/category/',$input['imagename']);
        $category->image = 'storage/category/'.$input['imagename'];
        $category->save();
        $request->session()->flash('success', 'la catégorie as bien été créer');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,
        [
            'name'=>"required",
            'color'=>"required"

        ]);

            $name = $request->input('name');
            $slug = Str::slug($name,'-');
            $color = $request->input('color');

            if($category->isClean('image'))
            {
                $category->image  = $category->image;
            }

            $category->name = $name;
            $category->slug = $slug;
             $category->color = $color;

       if($request->hasFile('image'))
    {
        $this->checkIfImageExist($category);
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

            $resize = Image::make($file)->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg');

        // Create hash value
        $hash = md5($resize->__toString());

        // Prepare qualified image name
        $image = $hash."jpg";

        // Put image to storage
    
        $image =  Storage::put('category/',$image);
        $file->move('storage/category/',$fileNameToStore);
        $category->image = 'storage/category/'.$fileNameToStore;
    }
        $category->save();

        Session::flash('success', 'La catégorie a bien été modifiée');
        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category)
        {
            $category->delete();
            Session::flash('success', 'La catégorie a bien été supprimée');
            return redirect('admin/category');
        }

    }
    public function checkIfImageExist(category $categories)
    {

        if(file_exists(public_path($categories->image)))
        {
            unlink(public_path($categories->image));
                
        }
      
    }
}
