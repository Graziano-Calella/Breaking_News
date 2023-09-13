<?php

namespace App\Actions\Fortify;

// use Laravel\Fortify\Rules\Password;
use Illuminate\Validation\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    protected function passwordRules(): array
    {
        // return ['required', 'string', new Password, 'confirmed'];
        // return ['required', 'string', (new Password())->requireUppercase()->requireNumeric()->requireSpecialCharacter(),'confirmed'];
        return [
            'required', 
            'string', 
            Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols(),
            'confirmed',
        ];
    }
}