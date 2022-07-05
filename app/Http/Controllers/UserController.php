<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

// Email
use Illuminate\Support\Facades\Mail;
use App\Mail\eamil_verification_mail;

class UserController extends Controller
{
    /**
     * Returns Login Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('welcome');
    }

    /**
     * Returns Signup Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSignUp()
    {
        return view('auth.signup');
    }

    /**
     * Login User.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        # Validation
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6', 'max:20']
        ]);
        return $request;
    }

    /**
     * Send Verification Email.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendEmail($email)
    {
        $user = User::where('email', $email)->first();
        $user->update([
            'verification_code' =>  rand(10000000,50000000),
        ]);
        Mail::to($email)->send(new eamil_verification_mail($user)); 
    }

    /**
     * SignUp User.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signUp(Request $request)
    {
        # Validation
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:20|min:6|confirmed',
        ]);

        # create users
        User::create($request->all());

        $this->sendEmail($request->email);

        return view('welcome');
    }

    /**
     * Logout User and returns welcome page.
     *
     * @return \Illuminate\Http\Response
     */
    public function logoutUser()
    {
        //
    }

    /**
     * verify email address.
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyEamil($verification_code)
    {
        $user=User::where('verification_code', $verification_code)->first();
        if(!$user) {
            return "Not Verified";
        }
    }

}
