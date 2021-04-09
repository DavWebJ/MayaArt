<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $product = Product::with('category')->get();
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
            'vignette1' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'vignette2' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'vignette3' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'vignette4' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'alt1'=>'required',
            'alt2'=>'required',
            'alt3'=>'required',
            'alt4'=>'required',
            'meta'=>'required',
            'detail'=>'required',
            'desc'=>'required',
            'price'=>'required',
            'stock'=>'required'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'detail' => $request->detail,
            'slug' => Str::slug($request->name,'-'),
            'vignette1' => 'image',
            'vignette2' => 'image',
            'vignette3' => 'image',
            'vignette4' => 'image',
            'alt1'=>$request->alt1,
            'alt2'=>$request->alt2,
            'alt3'=>$request->alt3,
            'alt4'=>$request->alt4,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'category_id' => $request->category,
            'meta'=> $request->meta,
        ]);

      
        if($request->hasFile('vignette1'))
        {

            $file = $request->file('vignette1');

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
            $product->vignette1 = 'storage/product/' .$fileNameToStore;
            
        }

        if($request->hasFile('vignette2'))
        {

            $file = $request->file('vignette2');

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
            $product->vignette2 = 'storage/product/' .$fileNameToStore;
            
        }

        if($request->hasFile('vignette3'))
        {

            $file = $request->file('vignette3');

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
            $product->vignette3 = 'storage/product/' .$fileNameToStore;
            
        }

        if($request->hasFile('vignette4'))
        {

            $file = $request->file('vignette4');

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
            $product->vignette4 = 'storage/product/' .$fileNameToStore;
            
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
            $detail = $request->input('detail');
            $desc = $request->input('desc');
            $alt1 = $request->input('alt1');
            $alt2 = $request->input('alt2');
            $alt3 = $request->input('alt3');
            $alt4 = $request->input('alt4');
            $price = $request->input('price');
            $stock = $request->input('stock');
            $slug = Str::slug($name,'-');
            $meta = $request->input('meta');
            $price_promos = $request->input('price_promos');
            
            if(!empty($price_promos))
            {
                $product->price_promos = $price_promos;
            }

            if($product->isClean('vignette1'))
            {
                
                $product->vignette1  = $product->vignette1;
            }
            if($product->isClean('vignette2'))
            {
                
                $product->vignette2  = $product->vignette2;
            }
            if($product->isClean('vignette3'))
            {
                
                $product->vignette3  = $product->vignette3;
            }
            if($product->isClean('vignette4'))
            {
                
                $product->vignette4  = $product->vignette4;
            }
            if($product->isClean('desc'))
            {
                
                $product->desc  = $product->desc;
            }
            if($product->isClean('detail'))
            {
                
                $product->detail  = $product->detail;
            }
   

            $product->name = $name;
            $product->detail = $detail;
            $product->desc = $desc;
            $product->alt1 = $alt1;
            $product->alt2 = $alt2;
            $product->alt3 = $alt3;
            $product->alt4 = $alt4;
            $product->stock = $stock;
            $product->price = $price;
            $product->slug = $slug;
            $product->category_id = $request->category;
            $product->meta = $meta;
            $product->price_promos = $price_promos;

        if($request->hasFile('vignette1'))
        {

            $file = $request->file('vignette1');

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
            $product->vignette1 = 'storage/product/' .$fileNameToStore;
          
        }

         if($request->hasFile('vignette2'))
        {

            $file = $request->file('vignette2');

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
            $product->vignette2 = 'storage/product/' .$fileNameToStore;
          
        }

        if($request->hasFile('vignette3'))
        {

            $file = $request->file('vignette3');

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
            $product->vignette3 = 'storage/product/' .$fileNameToStore;
          
        }

        if($request->hasFile('vignette4'))
        {

            $file = $request->file('vignette4');

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
            $product->vignette4 = 'storage/product/' .$fileNameToStore;
          
        }
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
