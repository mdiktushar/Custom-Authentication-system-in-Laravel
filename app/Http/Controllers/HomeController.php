<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * return Home view
     */
    public function home()
    {
        return view('auth.pages.home');
    }
}
