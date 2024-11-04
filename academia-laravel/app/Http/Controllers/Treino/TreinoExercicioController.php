<?php

namespace App\Http\Controllers\Treino;

use App\Models\AlunoTreino;
use App\Models\TreinoExercicio;
use App\Models\Treino;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class TreinoExercicioController extends Controller{
    public function store(Request $request,int $id_personal, int $id_aluno){

        $request->validate([
            'exercicios' => 'required|array|min:1',
            'musculo' => 'required|string',
            'tipo_treino' => 'required|string',
        ]);

        $exercicios = $request->input('exercicios');

        $personal = User::findOrFail($id_personal);

        $treino_id = Treino::create([
            'tipo_treino'=>$request->tipo_treino,
            'musculo'=>$request->musculo,
            'id_personal'=>$personal->id
        ]);

        foreach($exercicios as $exercicio){
            TreinoExercicio::create([
                'treino_id' => $treino_id->id,
                'exercicio_id' => $exercicio['id'],
            ]);
        }

        $aluno = User::findOrFail($id_aluno);

        AlunoTreino::create([
            'aluno_id' => $aluno->id,
            'treino_id' => $treino_id->id,
        ]);

        return redirect()->route('personal.treino')->with('success','Treino criado com sucesso!');

    }

    public function index(){

    }

    public function update(Request $request, $id){

    }

    public function edit($id){
        
    }

    public function destroy($id){

    }
    
}