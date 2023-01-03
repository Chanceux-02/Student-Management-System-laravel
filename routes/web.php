<?php

use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Mockery\Exception\NoMatchingExpectationException;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// common routes naming
// index - show all data or students
// show - show a single data or student
// create - show a form to a new user
// store - store a data
// show form to a data
// update - update a data
// destroy - delete a data


//ang middleware ang naga prevent nga i access nga wala guard ang isa ka url.
//ang auth ma access lang kung naka login na kag ang login page ma access lang kung naka logout na, indi pwedi ma access nga naka login.

Route::get('/', [StudentsController::class, 'index'])->middleware('auth'); // ang middleware is guard nga para kung mag log out nd na kabalik sa home biskan i manual butang sa url
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest'); //allias para makilala ya // naga check lang kung may user nga naga login kag amuni ang naga show sang ui sang login
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/register', [UserController::class, 'register']);
Route::post('/login/process', [UserController::class, 'process']); //dire makadto ang form gamit ang action

Route::post('/store', [UserController::class, 'store']);

Route::get('/add/student', [StudentsController::class, 'create']);
Route::post('/add/student', [StudentsController::class, 'store']);
Route::get('/student/{id}', [StudentsController::class, 'show']);
Route::put('/student/{id}', [StudentsController::class, 'update']);




// Route::get('/users', [UserController::class, 'index'])->name('login');

// Route::get('/users{id}', [UserController::class, 'show']);

// Route::get('/students', [StudentsController::class, 'index']);
