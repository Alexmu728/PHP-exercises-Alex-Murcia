<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Mostrar el formulario para editar el perfil
    public function edit()
    {
        return view('profile.edit');  // Debes crear la vista profile/edit.blade.php
    }

    // Actualizar la información del perfil
    public function update(Request $request)
    {
        // Validar y actualizar los datos del perfil
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Profile updated!');
    }

    // Eliminar el perfil del usuario (opcional)
    public function destroy()
    {
        Auth::user()->delete();

        return redirect('/')->with('status', 'User deleted successfully');
    }
}

