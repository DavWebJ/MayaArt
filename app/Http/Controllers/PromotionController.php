<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

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
        return view('admin.promotion.create');
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
        ]);

        
        $promos = Promotion::create([
            'title' => $request->title,
            'banner' => 'image',
            'alt'=>$request->alt,
            'desc'=>$request->desc,
        ]);


        if($request->hasFile('image') )
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

            $file->move('storage/promos/banner/',$fileNameToStore);
            $promos->image = 'storage/promos/banner/' .$fileNameToStore;
           
        }

        $promos->save();

        $request->session()->flash('success', 'La réduction a bien été créée');
        return redirect('admin/dashboard');
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
