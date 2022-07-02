<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        return $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6', 'max:20']
        ]);
        return $request;
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
         return $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:20|min:6|confirmed',
        ]);

        # create users
        User::create($request->all());

        return back();
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

}
