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
     * verify email address.
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyEamil($verification_code, $email)
    {
        $user=User::where('email', $email)->first();
        if (!isset($user->id)){
            return redirect()->route('page.signup')->with('error', 'email is not found');
        }

        if ($verification_code == $user->verification_code) {
            $user->update([
                'email_verified_at' => date("Y-m-d H:i:s"),
            ]);
            return redirect()->route('page.login')->with("success", "Email is Verified Successfully You Can Login Now");
        } else {
            return "Not Verified";
        }
        
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

        return redirect()->route('page.login')->with('success', 'Please Verify your email to login');
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

        # finding the user
        $user = User::where('email', "=", $request->email)->first();
        /** if the email is found */
        if (isset($user->id)) {

            # if email is not verified
            if($user->email_verified_at == null) {
                return redirect()->back()->with('error', 'The email is not verified');
            }
            # Loging in
            if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('user.home')->with('success', 'welcome to the app');
            } else {
                return redirect()->back()->with('error', 'wrong password');
            }
            
        } else { 
            # the email is not found
            return redirect()->back()->with('error', 'Email is not found');
        }
    }

    /**
     * Logout User and returns welcome page.
     *
     * @return \Illuminate\Http\Response
     */
    public function logoutUser()
    {
        auth()->logout();
        return redirect()->route('page.login')->with('success', 'Logout Successfully');
    }
}
