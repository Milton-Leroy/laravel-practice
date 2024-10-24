<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function handleImage(Request $request)
    {
        $this->authorize('upload');

        $request->validate([
            'image' => ['required', 'image', 'max:5000']
        ]);

        $request->image->storeAs('/', 'first_uploaded_image.jpg');

        return redirect()->back();
    }
}
