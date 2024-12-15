<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Muestra el formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Procesa el login
    public function login(Request $request)
    {
        // Validación de las credenciales
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Si la autenticación es exitosa, redirige al dashboard o página deseada
            return redirect()->intended('/dashboard');
        }

        // Si las credenciales son incorrectas, regresa con un error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/home');
    }
}
