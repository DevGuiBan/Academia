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
        try{
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
        catch(\Exception $e){
            return redirect()->back()->with('error','Erro ao atribuir treino ao aluno: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id){
        try{
            $alunoTreino = AlunoTreino::findOrFail($id);
            
            $request->validate([
                'treino_id' => ['required', 'exists:treinos,id'],
            ]);

            $alunoTreino->treino_id = $request->treino_id;
            $alunoTreino->save();

            return redirect('personal/treino')->with('sucess', 'Treino do aluno atualizado com sucesso!');
        }
        catch(\Exception $e){
            return redirect('personal/treino')->with('error', 'Não foi possível atualizar trein: ' . $e->getMessage());
        }
    }

    public function edit($id){
        $alunoTreino = AlunoTreino::find($id);
        $treinos = Treino::all();

        return view('personal.editTreino', compact('alunoTreino', 'treinos'));
    }

    public function destroy($id){
        try{
            $alunoTreino = AlunoTreino::find($id);
            $alunoTreino->delete();

            return redirect()->back()->with('success', 'Treino removido com sucesso!');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Erro ao remover treino: ' . $e->getMessage());
        }
    }
}