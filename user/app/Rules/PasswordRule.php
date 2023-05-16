<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Faker\Factory as Faker;

class PasswordRule implements Rule
{

    protected $errorMsg;

    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        $hasUppercase = preg_match('/[A-Z]/', $value);
        $hasLowercase = preg_match('/[a-z]/', $value);
        $hasDigit = preg_match('/\d/', $value);
        $hasSpecialChar = preg_match('/[@$!%*?&]/', $value);

        if (!$hasUppercase) {
            $this->errorMsg = 'A senha deve conter pelo menos uma letra maiúscula.';
        } else if (!$hasLowercase) {
            $this->errorMsg = 'A senha deve conter pelo menos uma letra minúscula.';
        } else if (!$hasDigit) {
            $this->errorMsg = 'A senha deve conter pelo menos um número.';
        } else if (!$hasSpecialChar) {
            $this->errorMsg = 'A senha deve conter pelo menos um caractere especial.';
        }

        return $hasUppercase && $hasLowercase && $hasDigit && $hasSpecialChar;
    }

    public function message()
    {
        return $this->errorMsg ?: 'A senha deve ter pelo menos oito caracteres, uma letra maiúscula, uma letra minúscula, um número e um caractere especial.';
    }

    public static function generatePassword():string
    {
        $faker = Faker::create();

        $lower = $faker->randomLetter;
        $upper = strtoupper($faker->randomLetter);
        $digit = $faker->randomDigit;
        $special = $faker->randomElement(['!', '@', '#', '$', '%', '&', '*', '?']);

        $password = $faker->shuffle($lower.$upper.$digit.$special.$faker->regexify('[A-Za-z0-9]{8,}'));

        return $password;
    }
}
