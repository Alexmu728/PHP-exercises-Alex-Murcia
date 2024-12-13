<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'role' => ['required', 'string', 'in:admin,teacher,student'], // Validación del rol
        ]);

        // Crear el nuevo usuario con el rol especificado
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,  // Guardar el rol enviado en el formulario
        ]);

        // Iniciar sesión automáticamente después del registro
        Auth::login($user);

        // Redirigir a la página correspondiente según el rol
        if ($user->role === 'admin') {
            return redirect('/admin');  // Ruta para administradores
        } elseif ($user->role === 'teacher') {
            return redirect('/school_organization');  // Ruta para profesores
        } else {
            return redirect(RouteServiceProvider::HOME);  // Ruta para estudiantes
        }
    }
}

