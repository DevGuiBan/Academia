<?php

namespace App\Http\Controllers\Treino;

use App\Models\AlunoTreino;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Treino;


class AlunoTreinoController extends Controller{
    public function index(){
        $treinos = AlunoTreino::with('treino')->get();
        return view('aluno.treino', compact('treinos'));
    }

    public function store(Request $request){
        $request->validate([
            'aluno_id' => ['required', 'exists:users,id'],
            'treino_id' => ['required', 'exists:treinos,id']
        ]);

        AlunoTreino::create([
            'aluno_id' => $request->aluno_id,
            'treino_id' => $request->treino_id,
        ]);

        $aluno = User::find($request->user);

        return redirect()->back()->with('success','Treino atribuído ao aluno' . $aluno->nome . 'com sucesso!');
    }

    public function update(Request $request, $id){
        $alunoTreino = AlunoTreino::find($id);
        
        $request->validate([
            'treino_id' => ['required', 'exists:treinos,id'],
        ]);

        $alunoTreino->treino_id = $request->treino_id;
        $alunoTreino->save();

        return redirect('personal/treino')->with('sucess', 'Treino do aluno atualizado com sucesso!');
    }

    public function edit($id){
        $alunoTreino = AlunoTreino::find($id);
        $treinos = Treino::all();

        return view('personal.editTreino', compact('alunoTreino', 'treinos'));
    }

    public function destroy($id){
        $alunoTreino = AlunoTreino::find($id);
        $alunoTreino->delete();

        return redirect()->back()->with('success', 'Treino removido com sucesso!');
    }
}