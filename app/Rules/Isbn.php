<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class Isbn implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (empty($value)) {
            $fail('The :attribute is required.');
            return;
        }

        $value = str_replace('-', '', $value);

        if (!is_numeric($value)) {
            $fail('The :attribute must be numeric.');
            return;
        }

        if (strlen($value) !== 10 && strlen($value) !== 13) {
            $fail('The :attribute must be 10 or 13 digits.');
            return;
        }
    }
}
