<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Logic to handle the home page view
        return view('home.index');
    }

    public function contact()
    {
        // Logic to handle the contact page view
        return view('home.contact');
    }
}