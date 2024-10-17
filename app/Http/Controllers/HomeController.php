<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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

        //Understanding one to one inverse relation
        /* $addresses = Address::with('user')->get();
        return $addresses; */

        //one to many relation
       /*  $categories = Category::find(3)->posts;
        return view('home', compact('categories')); */

        $post = Post::first();
        $tag = Tag::find(2);

        return $post->tags()->attach($tag);
    }
}
