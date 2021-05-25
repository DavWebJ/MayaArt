<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
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
        $promos = Promotion::first();

        return view('admin.promotion.index',compact('promos'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.promotion.create',compact('products'));
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
            'title'=>'required|unique:promotions,title',
            'banner' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'alt'=>'required',
            'desc'=>'required',
            'product_id' => ['required','exists:App\Models\product,id'],
            'end'=>'required'
        ]);

        
        $promos = Promotion::create([
            'title' => $request->title,
            'alt'=>$request->alt,
            'banner'=>'image',
            'desc'=>$request->desc,
            'product_id'=>$request->product_id,
            'end' =>$request->end
        ]);
           

        $file = $request->file('banner');
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

        $resize = Image::make($file)->resize(1920, 750, function ($constraint) {
        $constraint->aspectRatio();
      })->encode('jpg');

      // Create hash value
      $hash = md5($resize->__toString());

      // Prepare qualified image name
      $image = $hash."jpg";

      // Put image to storage
       // Storage::move('storage/promos/',$image);
       $image =  Storage::put('promos/',$image);
       $file->move('storage/promos/',$fileNameToStore);
        $promos->banner = 'storage/promos/'.$fileNameToStore;

        $promos->save();
        $request->session()->flash('success', 'La promotion a bien été créée');
        return redirect()->route('promotion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
         return view('admin.promotion.edit',compact(['promotion']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        $this->validate($request,
        [
            'title'=>'required',
            'alt'=>'required',
            'desc'=>'required',
        ]);
           
            if($promotion->isClean('title'))
            {
                
                $promotion->title  = $promotion->title;
            }
            if($promotion->isClean('desc'))
            {
                
                $promotion->desc  = $promotion->desc;
            }

            if($promotion->isClean('banner'))
            {
                $promotion->banner  = $promotion->banner;
            }


            $promotion->title  = $request->title;
            $promotion->alt = $request->alt;
            $promotion->desc =$request->desc;





        if($request->hasFile('banner') )
        {
            $file = $request->file('banner');

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

            $file->move('storage/promos/banner/',$fileNameToStore);
            $promotion->banner = 'storage/promos/banner/' .$fileNameToStore;
           
        }

        $promotion->save();

        $request->session()->flash('success', 'Votre réduction a bien été modifiée');
        return redirect('admin/promotion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        //
    }
}
