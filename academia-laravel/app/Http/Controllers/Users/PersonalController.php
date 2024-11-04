<?php
namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{

    public function profile(int $id){
        $user = User::find($id);
        return view('personal.profile', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', $user->id],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = $request->password;
        $user->save();

        return redirect('personal/profile')->with('sucess', 'Seu perfil foi atualizado com sucesso!');
    }  

    public function createTreino(){
        
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('personal.profile')->with('error', 'Personal não encontrado.');
        }

        try {
            $user->delete();
            Auth::logout();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('personal.profile')->with('error', 'Não foi possível excluir sua conta.');
        }

        return redirect()->route('login')->with('success', 'Sua conta foi excluída com sucesso!');
    }

    public function getExercicios($personalId)
    {
        $personal = User::findOrFail($personalId);

        $treinos = $personal->treinos()->with('exercicios')->get();

        return view('personal.exercicio', compact('personal', 'treinos'));
    }

}