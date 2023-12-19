<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Define a method to handle the home page route
    public function index()
    {
        // Return a view (for example, home.blade.php) located in resources/views
        return view('home');
    }
}
