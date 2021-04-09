<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */

     
    protected function passwordRules()
    {
        (new Password)->length(8)->requireNumeric()->requireUppercase();

        return ['required', 'string', new Password, 'confirmed'];
    }
}
