<?php

namespace App\Http\Controllers\Treino;

use App\Models\AlunoTreino;
use App\Models\TreinoExercicio;
use App\Models\Exercicio;   
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TreinoExercicioController extends Controller{
    public function store(Request $request, $aluno_id,$personal_id, $treino_id){
        try{
            $request->validate([
                'exercicios' => 'required|array|min:1',
            ]);

            foreach ($request->input('exercicios') as $exercicio_id) {
                TreinoExercicio::create([
                    'treino_id' => $treino_id,
                    'exercicio_id' => $exercicio_id,
                ]);
            }

            AlunoTreino::create([
                'aluno_id' => $aluno_id,
                'treino_id' => $treino_id,
            ]);

            return redirect()->route('personal.treino')->with('success', 'Treino criado com sucesso!');
        }
        catch(\Exception $e){
            return redirect()->route('personal.treino')->with('error', 'Não foi possível criar treino' . $e->getMessage());
        }
    }

    public function selecionarExercicios($aluno_id, $personal_id, $treino_id){
        $exercicios = Exercicio::all();

        return view('personal.salvarTreino', compact('exercicios', 'aluno_id', 'personal_id', 'treino_id'));
    }
    
}