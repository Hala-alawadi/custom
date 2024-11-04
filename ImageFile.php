<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ImageFile implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // التحقق من أن الملف صورة
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $maxFileSize = 1024 * 1024; // 1 ميجابايت

        // التحقق من نوع الملف وحجمه
        if (!in_array($value->getMimeType(), $allowedMimeTypes) || $value->getSize() > $maxFileSize) {
            $fail('يجب أن يكون :attribute صورة بصيغة JPEG أو PNG أو GIF وأقل من 1 ميجابايت.');
        }
    }
}