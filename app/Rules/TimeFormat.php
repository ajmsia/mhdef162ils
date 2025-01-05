<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TimeFormat implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match('/^(0[0-9]|1[0-9]|2[0-3]):([0-5][0-9])$/', $value);
    }

    public function message()
    {
        return 'The :attribute must be a valid time in the format HH:MM.';
    }
}
