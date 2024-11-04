<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\NameLength;
use App\Rules\ImageFile;

class FormController extends Controller
{
    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => ['required', new NameLength],
            'file' => ['required', 'file', new ImageFile]
        ]);

        return back()->with('success', 'تم التحقق من صحة البيانات بنجاح');
    }
}