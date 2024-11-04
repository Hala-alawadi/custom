<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NameLength implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // التحقق من أن طول الاسم 5 أحرف فقط
        if (strlen($value) !== 5) {
            $fail('يجب أن يكون :attribute مكونًا من 5 أحرف بالضبط.');
        }
    }
}