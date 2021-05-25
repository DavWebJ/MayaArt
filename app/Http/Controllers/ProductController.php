<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
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
        $product = Product::with('category','images')->get();
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.product.create',compact('category'));
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
            'name'=>'required|unique:products,name',
            'category'=>'required',
            'meta'=>'required',
            'desc'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'main_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'video'=>'mimetypes:video/mp4/avi/3gp',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'slug' => Str::slug($request->name,'-'),
            'price'=>$request->price,
            'stock'=>$request->stock,
            'category_id' => $request->category,
            'meta'=> $request->meta,
            'main_image'=>'image',
            'video'=>'video'
        ]);

        if($request->hasFile('main_image') )
        {
            $file = $request->file('main_image');
            
            
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
 
            $file->move('storage/product/',$fileNameToStore);
            $product->main_image = 'storage/product/' .$fileNameToStore;
           
        }
        if($request->hasFile('video') )
        {
            $file = $request->file('video');
            
            
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
 
            $file->move('storage/product/video/',$fileNameToStore);
            $product->video = 'storage/product/video/' .$fileNameToStore;
           
        }
        $product->save();
        $request->session()->flash('success', 'Félicitations !  Votre produit est en vente dans votre boutique');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.product.edit',compact(['product','category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,
        [
            'stock'=>'required',

        ]);


            $name = $request->input('name');
            $desc = $request->input('desc');
            $price = $request->input('price');
            $stock = $request->input('stock');
            $slug = Str::slug($name,'-');
            $meta = $request->input('meta');
            $price_promos = $request->input('price_promos');
            
            if(!empty($price_promos))
            {
                $product->price_promos = $price_promos;
            }

            if($product->isClean('desc'))
            {
                
                $product->desc  = $product->desc;
            }

   

            $product->name = $name;
            $product->desc = $desc;
            $product->stock = $stock;
            $product->price = $price;
            $product->slug = $slug;
            $product->category_id = $request->category;
            $product->meta = $meta;
            $product->price_promos = $price_promos;

        $product->save();

        Session::flash('success', 'Ce produit a bien été modifié');
        return redirect('admin/product');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
