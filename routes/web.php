<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Mail\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([
        'middleware' => ['authcheck'],
        'prefix' => 'user',
        'as' => 'user.'
    ], function(){
        Route::get('/home', HomeController::class);
        Route::post('/upload-file', [ImageController::class, 'handleImage'])->name('upload-file');
});

Route::get('send-mail', function(){
   /*  Mail::raw('This is a test mail, to test sending mails', function($message){
        $message->to('test@gmail.com')->subject('No reply');
    }); */

    Mail::send(new Order);

    dd('Mail sent successfully');
});

Route::get('get-session', function(Request $request){
    /* $data = session()->all(); */

    $data = $request->session()->all();

    //$data = $request->session()->get('_token');

    dd($data);
});

Route::get('save-session', function(Request $request){
    $request->session()->put('user_id', '#452er45');
    return redirect('get-session');
});
