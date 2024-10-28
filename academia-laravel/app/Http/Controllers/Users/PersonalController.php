<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Dotenv\Exception\ValidationException;
use Hash;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    
    public function login(Request $request){
        $credentials = $request->validate([
            'email' =>['required', 'email'],
            'senha' =>['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            $user = Personal::where('email', $request->email)->first();

            $request->session()->put('user_id', $user->id);

            return redirect()->intended('teste');
        }
        throw ValidationException::withMessages([
            'email' => 'As credenciais estão incorretas'
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function register(Request $request){
        $request->validate([
            'nome' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        Personal::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login');
    }
}
