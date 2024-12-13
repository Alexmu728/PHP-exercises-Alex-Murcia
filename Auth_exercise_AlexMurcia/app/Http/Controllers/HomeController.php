<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function dashboard()
    {
        $message = auth()->user()->role !== 'student'
            ? 'Welcome, Teacher or Admin! Here’s your dashboard.'
            : 'Welcome to your dashboard, Student.';
        return view('dashboard', compact('message'));
    }

    public function admin()
    {
        return view('admin');
    }

    public function schoolOrganization()
    {
        return view('school_organization');
    }

    public function events()
    {
        return view('events');
    }
}
