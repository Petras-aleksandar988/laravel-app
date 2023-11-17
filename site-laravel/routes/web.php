<?php

use App\Models\Listing;
use Illuminate\Http\Request;
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
    return view('listings', [
        'heading' => 'Latest Listings',

        'listings'=>Listing::all()
    ]);
});
Route::get('/listings/{id}', function ($id) {
    return view('listing', [
        'oneListing'=> Listing::find($id)
    ]);
});

Route::get('/hello/{id}', function ($id) {
    return response('post ' . $id);
});
Route::get('/search', function (Request $request) {
   dd($request['name']);
});
