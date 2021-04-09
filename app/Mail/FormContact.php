<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class FormContact extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->contact = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $name = $request->name;
        $prenom = $request->prenom;
        $email = $request->email;
        $message = $request->message;
        
        if(empty($request->newsletter) || $request->newsletter == null){
            $newsletter = 0;
        }else{
            $newsletter = $request->newsletter;
        }
        
        $contact_mail = 'floriane@atelier-efka.fr';
        return $this
        ->subject("Floriane, vous avez reçu un nouveau message via votre site web !")
        ->from($email)
        ->to($contact_mail)
        ->view('email.contact');

    }
}
