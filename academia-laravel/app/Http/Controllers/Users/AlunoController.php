<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public function login(Request $request){

        $credentials = $request->validate([
            'email' =>['required','email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            $user = Aluno::where('email',$request->email)->first();

            $request->session()->put('user_id',$user->id);

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
        /*
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);
        */

        $request->validate([
            'nome' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:alunos'],
            'password' => ['required','string','min:6'],
            'endereco' => ['required','string','max:255']
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'plano_id' => null,
            'password' => Hash::make($request->password),
        ]);
    }
}
