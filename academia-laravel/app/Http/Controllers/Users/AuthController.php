<?php

namespace App\Http\Controllers\Users;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = Auth::user();
        try{
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                $user = User::where('email', $request->email)->first();
                $request->session()->put('user_id', $user->id); 
    
                if ($user->isAluno()) {
                    return redirect()->route('aluno.treino'); 
                } else {
                    return redirect()->route('personal.treino'); 
                }
            }else{
                throw ValidationException::withMessages([
                    'email' => 'As credenciais estão incorretas'
                ]);
            }
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Credenciais Inválidas');
        }
        
    }

    public function logout(Request $request)
    {
        try{
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Ocorreu um erro ao realizar o logout.');
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
            'role' => ['required', 'string', 'in:aluno,personal'],
        ]);
        try{
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);
    
            return redirect()->route('login')->with('success','Registro realizado com sucesso!');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Ocorreu um erro ao registrar o usuário.');
        }

    }
}
