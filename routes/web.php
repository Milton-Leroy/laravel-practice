<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Mail\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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
$request->session()->put(['status' => 'authenticated', 'type' => 'admin']);
session(['number' => '675243564']);
return redirect('get-session');
});

Route::get('destroy-session-data', function(Request $request){
//$request->session()->forget('type');
//session()->forget(['status', 'number']);
//session()->flush();
$request->session()->flush();
return redirect('get-session');
});

Route::get('flash-session', function(Request $request){
//$request->session()->flash('status', 'true');
session()->flash('status', 'true');
return redirect('get-session');
});

Route::get('forget-cache', function(){
Cache::forget('categories');
return redirect('user/home?auth=1');
});

require __DIR__.'/auth.php';
