<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


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
// all listings
Route::get('/', [ListingController::class, "index"]);


//store listing data
Route::post('/listings',[ListingController::class, "store"])->middleware('auth');

//show create form
Route::get('/listings/create',[ListingController::class, "create"])->middleware('auth');



// show edit form

Route::get('listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// show edit form

Route::put('listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//  delete listing

Route::delete('listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

Route::get('/listings/manage',[ListingController::class, 'manage'])->middleware('auth');


// single listing
Route::get('/listings/{list}',[ListingController::class, "show"]);

// show register create/form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//create New User 
Route::post('/users', [UserController::class, 'store']);


// log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


// show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');


//  login user
Route::post('/users/login', [UserController::class, 'authenticate']);








Route::get('/hello/{id}', function ($id) {
    return response('post ' . $id);
});
Route::get('/search', function (Request $request) {
   dd($request['city']);
});

