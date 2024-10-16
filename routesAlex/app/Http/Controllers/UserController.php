<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        // This is the home page where user sees FORM and EDAD buttons
        return view('home.index');
    }

    public function showForm() {
        // This displays the form for name and lastname
        return view('home.form');
    }

    public function submitForm(Request $request) {
        // Process the name and lastname
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
        ]);

        // Store the name and lastname in session or pass it directly
        session(['name' => $request->name, 'lastname' => $request->lastname]);

        // Redirect to the age form page
        return redirect()->route('home.age');
    }

    public function showAgeForm() {
        // Display the age form, showing the anonymous user if the name is not set
        $name = session('name', 'Anonymous');
        return view('home.age', ['name' => $name]);
    }

    public function submitAge(Request $request) {
        // Process the age input
        $request->validate([
            'age' => 'required|integer|min:1|max:33',
        ]);

        // Store the age in session
        session(['home.age' => $request->age]);

        // Redirect to the result page
        return redirect()->route('home.result');
    }

    public function showResult() {
        // Display the final result page with the user's age
        $age = session('home.age');
        $name = session('name', 'Anonymous');
        return view('home.result', ['age' => $age, 'name' => $name]);
    }
}
