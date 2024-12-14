<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function admin()
    {
        return view('dashboard.admin');
    }

    public function teacher()
    {
        return view('dashboard.teacher');
    }

    public function student()
    {
        return view('dashboard.student');
    }
}

