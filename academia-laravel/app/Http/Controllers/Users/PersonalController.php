<?php
namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Training;

class PersonalController extends Controller
{

    public function profile(int $id){
        $user = User::find($id);
        return view('personal.profile', compact('user'));
    }

    public function update(Request $request, $id){
        try{
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

            return redirect()->route('personal.profile')
            ->with('success', 'Seu perfil foi atualizado com sucesso!');
        }
        catch(\Exception $e){
            return redirect()->route('personal.profile')
            ->with('error', 'There was an error updating your profile' . $e->getMessage());
        }
    }  

    public function destroy($id){
        try{
            $user = User::find($id);

            if (!$user) {
                return redirect()->route('personal.profile')->with('error', 'Staff not found.');
            }

            try {
                $user->delete();
                Auth::logout();
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return redirect()->route('personal.profile')->with('error', 'Unable to delete your account.');
            }

            return redirect()->route('login')->with('success', 'Your account has been deleted successfully!');
        }
        catch(\Exception $e){
            return redirect()->route('personal.profile')->with('error', 'An error occurred while deleting your account: ' . $e->getMessage());
        }
    }

    public function getTrainingOfPersonal($personalId){
        try{
            $personal = User::findOrFail($personalId);

            $trainingWithExercises = Training::where('personal_id', $personalId)
                ->with('exercicios') 
                ->get();
            $dados = [];
            foreach ($trainingWithExercises as $training) {
                $dados[] = [
                    'treino' => $training,
                    'exercicios' => $training->exercicios->map(function ($exercise) {
                        return [
                            'id' => $exercise->id,
                            'nome' => $exercise->nome,
                            'quantidade_de_repeticoes' => $exercise->quantidade_de_repeticoes,
                            'link_de_visualizacao' => $exercise->link_de_visualizacao,
                        ];
                    })->toArray(),
                ];
            }

            return view('personal.exercise', compact('dados', 'personal'));
        }
        catch(\Exception $e){
            return redirect()->route('personal.exercises',['id'=>$personalId])
            ->with('error', 'Erro while load the trainings: ' . $e->getMessage());
        }
    }

}