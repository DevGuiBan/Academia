<?php

namespace App\Http\Controllers\Users;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\Treino;

class AlunoController extends Controller
{
    public function profile(int $id){
        try{
            $user = User::findOrFail($id);
            return view('aluno.profile', compact('user'));
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with('error','Não foi possivel acessar o Perfil do Aluno');
        }
    }
    
    public function update(Request $request, $id){
        try{
            $user = User::findOrFail($id);

            $request->validate([
                'name' => ['required', 'string', 'max:255', 'min:3'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
                'address' => ['required', 'string', 'max:255'],
                'password' => ['nullable', 'string', 'min:6'],
            ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;

            if (!empty($request->password)) {
                $user->password = bcrypt($request->password);
            }        

            $user->save();

            return view('aluno.profile', compact('user'))->with('success', 'Seu perfil foi atualizado com sucesso!');
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return view('aluno.profile', compact('user'))->with('error', 'Não foi possível atualizar seu perfil.' . $e->getMessage());
        }
    }

    public function destroy($id){
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('aluno.profile')->with('error', 'Aluno não encontrado.');
        }

        try {
            $user->delete();
            Auth::logout();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('aluno.profile')->with('error', 'Não foi possível excluir sua conta.');
        }

        return redirect()->route('login')->with('success', 'Sua conta foi excluída com sucesso!');
    }

}
