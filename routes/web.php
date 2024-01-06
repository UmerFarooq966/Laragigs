<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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

// All Listing
Route::get('/',[ListingController::class, "index"]);


// Show Create Form
Route::get('/listings/create',[ListingController::class, "create"])->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class, "store"])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, "edit"])->middleware('auth');

// Update Listings
Route::put('/listings/{listing}', [ListingController::class, "update"])->middleware('auth');

// Delete Listings
Route::delete('/listings/{listing}', [ListingController::class, "destroy"])->middleware('auth');

// Manage Listings

Route::get('/listings/manage', ListingController::class, 'manage')->middleware('auth');


// Single Listing
Route::get('/listings/{listing}', [ListingController::class, "show"]);

// Show Register Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');


// create New User
Route::post('/users', [UserController::class, 'store']);

// Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Forum
Route::get('/login', [UserController::class,'login'])->name('login')->middleware('guest');

// Login user
Route::post('/users/authenticate',[UserController::class, 'authenticate']);



