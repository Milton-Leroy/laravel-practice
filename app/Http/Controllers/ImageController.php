<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function handleImage(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:5000']
        ]);

        $request->image->storeAs('/', 'first_uploaded_image');

        return redirect()->back();
    }
}
