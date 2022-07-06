<?php
# inport controllers using namespace
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

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

# Free Route
# ------------------------------------------
Route::group(['middleware' => ['Back']], function(){
    /*
    | Get Login Page/Welcome Page
    | GET Request
    */
    Route::get('/', [UserController::class, 'getLogin'])->name('page.login');

    /*
    | Get SignUp Page
    | GET Request
    */
    Route::get('/signup', [UserController::class, 'getSignUp'])->name('page.signup');

    # Action Routes
    # ------------------------------------------
    /*
    | SignUp User
    | POST Request
    */
    Route::post('/signup', [UserController::class, 'signUp'])->name('user.signup');
    /*
    | Login User
    | POST Request
    */
    Route::post('/login', [UserController::class, 'login'])->name('user.login');

});


/** Auth Routh */
Route::group(['middleware' => ['Auth']], function() {
    /*
    | Logout User
    | GET Request
    */
    Route::get('/logout', [UserController::class, 'logoutUser'])->name('user.logout');
    /**
     * Return homepage
     * GET Request
     */
    Route::get('/home', [HomeController::class, 'home'])->name('user.home');

});

/* 
    | Email Verification code
    | GET Request
    */
    Route::get('/auth/verify-email/{verification_code}/{email}', [UserController::class, 'verifyEamil'])->name('verifyEamil');
