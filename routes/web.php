<?php

use Illuminate\Support\Facades\Route;

# inport controllers using namespace
use App\Http\Controllers\UserController;

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

# Get Routes
# ------------------------------------------
/*
| Get Login Page/Welcome Page
| GET Request
*/
Route::get('/', [UserController::class, 'getLogin'])->name('page.login');
/*
| Get SignUp Page
| GET Request
*/

# Action Routes
# ------------------------------------------
/*
| SignUp User
| POST Request
*/

/*
| Login User
| POST Request
*/
Route::post('/login', [UserController::class, 'login'])->name('user.login');

/*
| Logout User
| GET Request
*/