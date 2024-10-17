<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // when working  on one to one relation betwen user and address table
       /*  $users = User::with('address')->get();
        return $users; */

        $addresses = Address::with('user')->get();
        return $addresses;
    }
}
