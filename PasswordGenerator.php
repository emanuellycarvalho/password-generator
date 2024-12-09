<?php

class PasswordGenerator
{
    public function generate(int $length = 8, bool $includeSpecial = true, bool $includeNumbers = true, bool $includeUppercase = true): string
    {
        if ($length < 4) {
            throw new InvalidArgumentException("Password length must be at least 4 characters.");
        }

        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $special = '!@#$%^&*()-_+=<>?';
        $uppercase = strtoupper($lowercase);

        $characters = $lowercase;

        if ($includeSpecial) {
            $characters .= $special;
        }
        if ($includeNumbers) {
            $characters .= $numbers;
        }
        if ($includeUppercase) {
            $characters .= $uppercase;
        }

        $password = '';
        $charactersLength = strlen($characters);

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $password;
    }
}
