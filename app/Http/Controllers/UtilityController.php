<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UtilityController extends Controller
{
    public function generateSlug(Request $request)
    {
        return response()->json(['slug' => Str::slug($request->value)]);
    }
}
