<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Mostrar el formulario de registro
    public function showRegisterForm()
    {
        return view('register'); // Suponiendo que tu vista de registro está en resources/views/register.blade.php
    }

    // Manejar el registro del usuario
    public function register(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register.show')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Asegúrate de cifrar la contraseña
        ]);

        // Iniciar sesión automáticamente
        Auth::login($user);

        // Redirigir a la página de inicio o al panel de usuario
        return redirect()->route('home'); // Cambia 'home' por la ruta adecuada
    }
    public function showLoginForm()
    {
        return view('login');  // Vista del formulario de login
    }

    // Manejar el inicio de sesión
    public function login(Request $request)
    {
        // Validar las credenciales del usuario
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Intenta autenticar al usuario
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Si las credenciales son válidas, el usuario está autenticado
            $user = Auth::user();
            Auth::login($user);
            return redirect()->route('home');
        }

        // Si no es posible autenticar, redirigir con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ]);
    }


    public function logout()
    {
        Auth::logout();
        return redirect('home'); // O la ruta que desees redirigir al cerrar sesión
    }
}
