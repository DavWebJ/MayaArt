<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Mail\FormContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
class MessageController extends Controller
{
    public function send(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required',
            'prenom' => 'bail|required',
            'email' => 'bail|required|email',
            'message' => 'bail|required',
            'newsletter'=>'nullable'
        ]);


        Mail::send(new FormContact($request));

        Session::flash('success', 'Votre message à été envoyé avec succès merci !');
        return redirect()->route('contact');
    }
}
