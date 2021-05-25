<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\NewsLetter;
use Illuminate\Support\Carbon;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();


        if(empty($input['newsletter']) || $input['newsletter'] == null){
            $newsletter = 0;
        }else{
            $newsletter = $input['newsletter'];
        }
        $email = $input['email'];
        $name = $input['name'];
        $prenom = $input['prenom'];
        if($newsletter == 1){
            NewsLetter::updateOrInsert([
                'email' => $email,
                'name'=>$name,
                'prenom'=>$prenom,
                'created_at'=>Carbon::now(),

            ]);
            
        }

        return  User::create([
            'name' => $input['name'],
            'prenom' => $input['prenom'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'email_verified_at'=>Carbon::now(),
        ]);

    }
}
