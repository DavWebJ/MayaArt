<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = Option::with('products')->get();
   
        return view('admin.option.index',compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::with('category')->get();
        return view('admin.option.create',compact('products'));

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
            'option' =>'required|unique:options,option',
            'option_price' => 'integer|nullable',
            'product_id'=>'required',


        ]);

        $option = Option::create([
            'option' => $request->option,
            'option_price'=>$request->option_price,
            
        ]);
        $product_id = $request->product_id;
        $option->products()->attach($product_id);
        $option->save();
        $request->session()->flash('success', 'Votre option a bien été créée');
        return redirect('admin/option');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        $products = Product::all();
        return view('admin.option.edit',compact(['option','products']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Option $option)
    {
        $this->validate($request,
        [
            'option'=>'required',
        ]);


            $newoption = $request->input('option');
            $priceoption = $request->input('option_price');
            $option->option = $newoption;
            $product_id = $request->product_id;
            $option->products()->sync($product_id,['product_id'=>$product_id,'option_id'=>$option->id]);

       
        $option->save();

        Session::flash('success', 'Cette option a bien été modifiée');
        return redirect('admin/option');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        //
    }
}
