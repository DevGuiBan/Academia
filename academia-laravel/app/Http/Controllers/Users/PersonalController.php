<?php
namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Treino;

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

        return redirect('personal/profile')->with('success', 'Seu perfil foi atualizado com sucesso!');
    }  

    public function destroy($id){
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

    public function getExerciciosAluno($personal_id){
        $aluno = User::findOrFail($personal_id);

        if ($aluno && $aluno->isAluno()) {
            $dadosTreinos = [];

            $treinos = $aluno->treinos;

            foreach ($treinos as $treino) {
                $dadosTreinos[] = [
                    'musculo' => $treino->musculo,
                    'tipo_de_treino' => $treino->tipo_de_treino,
                    'exercicios' => $treino->exercicios->map(function ($exercicio) {
                        return [
                            'nome' => $exercicio->nome,
                            'quantidade_de_repeticoes' => $exercicio->quantidade_de_repeticoes,
                            'link_de_visualizacao' => $exercicio->link_de_visualizacao, // Se necessário
                        ];
                    }),
                ];
            }

            $resultado = [
                'aluno' => [
                    'id' => $aluno->id,
                    'nome' => $aluno->name,
                ],
                'treinos' => $dadosTreinos,
            ];

            return view('personal.exercicio', compact('resultado'));
        }    
    }

    public function getTreinosDoPersonal($personalId){
        $personal = User::findOrFail($personalId);

        $treinosComExercicios = Treino::where('personal_id', $personalId)
            ->with('exercicios') // Carrega os exercícios associados a cada treino
            ->get();
        $dados = [];
        foreach ($treinosComExercicios as $treino) {
            $dados[] = [
                'treino' => $treino,
                'exercicios' => $treino->exercicios->map(function ($exercicio) {
                    return [
                        'id' => $exercicio->id,
                        'nome' => $exercicio->nome,
                        'quantidade_de_repeticoes' => $exercicio->quantidade_de_repeticoes,
                        'link_de_visualizacao' => $exercicio->link_de_visualizacao,
                    ];
                })->toArray(),
            ];
        }

        return view('personal.exercicio', compact('dados', 'personal'));
    }

}