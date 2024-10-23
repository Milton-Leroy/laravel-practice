<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        $categories = Cache::remember('categories', 60*5, function(){
            return Category::find(3)->posts;
        });
        return view('home', compact('categories'));

        //rememberForever('key', function(){}); we dont need a time duration and thus is used to store data forever in the cache

        //ubderstanding manay to many relationships
        /* $post = Post::first();
        $tag = Tag::find(2);

        return $post->tags()->attach($tag); */

        //return view('home');
    }
}
