<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\fileExists;

class HeaderController extends Controller
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
        $header = Header::all();

        return view('admin.header.index',compact('header'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headers = Header::all();

        return view('admin.header.create',compact('headers'));
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
            'title'=>'required|max:15',
            'banner' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'alt'=>'required',
            'subtitle'=>'required|max:15',
        ]);

        
        $header = Header::create([
            'title' => $request->title,
            'alt'=>$request->alt,
            'banner'=>'image',
            'subtitle'=>$request->desc,
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
       $image =  Storage::put('header/',$image);
       $file->move('storage/header/',$fileNameToStore);
        $header->banner = 'storage/header/'.$fileNameToStore;

        $header->save();
        $request->session()->flash('success', 'Le header a bien été créée');
        return redirect()->route('header.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function show(Header $header)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function edit(Header $header)
    {
         return view('admin.header.edit',compact(['header']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Header $header)
    {
        $this->validate($request,
        [
            'title'=>'required',
            'alt'=>'required',
            'subtitle'=>'required',
        ]);
           
        if($header->isClean('title'))
        {
            
            $header->title  = $header->title;
        }
        if($header->isClean('subtitle'))
        {
            
            $header->subtitle  = $header->subtitle;
        }

        if($header->isClean('banner'))
        {
            $header->banner  = $header->banner;
        }


        
    if($request->hasFile('banner'))
    {
        $this->checkIfImageExist($header);
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
    
        $image =  Storage::put('header/',$image);
        $file->move('storage/header/',$fileNameToStore);
        $header->banner = 'storage/header/'.$fileNameToStore;
    }

        $header->title  = $request->title;
        $header->alt = $request->alt;
        $header->subtitle =$request->subtitle;

        $header->save();

        Session::flash('success', 'Ce produit a bien été modifié');
        return redirect('admin/header');
    }


    public function checkIfImageExist(Header $header)
    {

        if(file_exists(public_path($header->banner)))
        {
            unlink(public_path($header->banner));
                
        }
      
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function destroy(Header $header)
    {
        if($header)
        {
            if(file_exists(public_path($header->banner)))
            {
                unlink(public_path($header->banner));
            }

            $header->delete();
            Session::flash('success', 'Ce header a bien été supprimé');
            return redirect('admin/header');
        }
    }
}
