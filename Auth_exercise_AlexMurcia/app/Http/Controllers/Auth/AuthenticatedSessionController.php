<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        if (Auth::check()) {
            return $this->redirectToDashboard(Auth::user());
        }

        return view('auth.login');  
    }

    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return $this->redirectToDashboard(Auth::user());
        }

        $request->session()->flush();

        return back()->withErrors([
            'email' => 'Credential not matching',
        ]);
    }

    protected function redirectToDashboard(User $user)
    {
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin');
            case 'teacher':
                return redirect()->route('teacher');
            case 'student':
                return redirect()->route('student');
            default:
                return redirect()->route('dashboard');
        }
    }

    protected function authenticated(Request $request, $user)
    {
        // Aquí puedes definir la redirección dependiendo del rol
        if ($user->role === 'admin') {
            return redirect()->route('admin');
        }

        if ($user->role === 'teacher') {
            return redirect()->route('teacher');
        }

        return redirect()->route('student');
    }

    public function destroy(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
}
}


