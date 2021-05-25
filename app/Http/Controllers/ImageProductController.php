<?php

namespace App\Http\Controllers;

use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ImageProductController extends Controller
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
        $imageProducts = ImageProduct::with('product')->get();
        return view('admin.productimage.index',compact('imageProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        return view('admin.productimage.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageProduct  $imageProduct
     * @return \Illuminate\Http\Response
     */
    public function show(ImageProduct $imageProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageProduct  $imageProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageProduct $imageProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImageProduct  $imageProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageProduct $imageProduct)
    {
        //
    }

    public function destroy($id)
    {
        
    }
}
