<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\GigController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
use App\Models\Service;
use App\Models\Profile;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $servies = Service::all();
    $photos = Profile::where('role_id', 3)->get();
    return view('user.index', compact('servies', 'photos'));
});

Auth::routes();

 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*settings*/
Route::get('dashboard/logout', [App\Http\Controllers\SettingsController::class, 'logout'])->name('dashboard.logout');
Route::resource('permission', PermissionController::class);
Route::resource('services', ServiceController::class);
Route::resource('gigs', GigController::class);
Route::resource('profiles', ProfileController::class);
Route::resource('gallery', GalleryController::class);

// more/photographer
Route::get('more/photographer', [App\Http\Controllers\PhotographerController::class, 'index'])->name('more.photographer');
Route::get('photographer/hire/{title}/{price}/{user_id}/{photographer_id}', [App\Http\Controllers\HireController::class, 'store'])->name('photographer.hire');
Route::get('hire/list', [App\Http\Controllers\HireController::class, 'index'])->name('hire.list');
Route::get('hire/status/{id}', [App\Http\Controllers\HireController::class, 'status']);


// more/gallary


Route::get('more/gallery', [GalleryController::class, 'mainindex'])->name('more.gallery');
Route::get('photographer/hire/{title}/{price}/{user_id}/{photographer_id}', [App\Http\Controllers\HireController::class, 'store'])->name('photographer.hire');
Route::get('hire/list', [App\Http\Controllers\HireController::class, 'index'])->name('hire.list');
Route::get('hire/status/{id}', [App\Http\Controllers\HireController::class, 'status']);


//contact
Route::post('contact/store', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
Route::get('contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('contact/destroy/{id}', [App\Http\Controllers\ContactController::class, 'destroy'])->name('contact.destroy');


// user
 Route::get('hire/me/{id}', [App\Http\Controllers\ProfileController::class, 'hire_me'])->name('hire.me');

Route::group([ "as"=>'user.' , "prefix"=>'user' , "namespace"=>'User' , "middleware"=>['auth','user']],function(){
    Route::get('/dashboard', [App\Http\Controllers\User\UserDashboardController::class, 'index'])->name('dashboard');
});

Route::group([ "as"=>'admin.' , "prefix"=>'admin' , "namespace"=>'Admin' , "middleware"=>['auth','admin']],function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard');
});


// payement here 
Route::get('/stripe', [StripeController::class, 'index'])->name('stripe.index');
Route::post('/stripe/payment', [StripeController::class, 'processPayment'])->name('stripe.payment');
Route::get('/payment-success', function () {
    return view('stripe.success');
})->name('stripe.success');
