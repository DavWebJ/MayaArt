<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class NewsLetterController extends Controller
{
    public function subscribe(Request $request)
    {
      
            $this->validate($request,
            [
                'email'=>'required|email',
                'name'=>'required|string',
                'prenom'=>'required|string'
   

            ]);

            $newsletter = NewsLetter::updateOrInsert([

                'email' => $request->email,
                'name' => $request->name,
                'prenom' => $request->prenom,
                'created_at'=>Carbon::now(),

            ]);
            Session::flash('success', 'Votre inscription à la newsletter est prise en compte merci !');
                
           return redirect()->back();

    }

    public function index()
    {
        $newsletters = NewsLetter::all();
        return view('admin.newsletter.index',compact('newsletters'));
    }
}
