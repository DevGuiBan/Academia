<?php

namespace App\Http\Controllers\Treino;

use App\Models\AlunoTreino;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Treino;
use App\Models\Progresso;


class AlunoTreinoController extends Controller{
    public function index(){
        $treinos = AlunoTreino::with('treino')->get();
        $personais = User::all()->where('role','personal');
        return view('aluno.treino', compact('treinos','personais'));
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
    public function getAlunoTreino($aluno_id, $treino_id)
    {
        try {
            $treinos = AlunoTreino::where('aluno_id', $aluno_id)
                ->where('treino_id', $treino_id)
                ->with('treino')
                ->get();

            $personais = [];
            foreach ($treinos as $treino) {
                $personais[] = $treino->treino->personal_id;
            }

            $exerciciosArray = [];
            foreach ($personais as $personalId) {
                $treinosComExercicios = Treino::where('personal_id', $personalId)
                    ->where('id',$treino_id)
                    ->with('exercicios') 
                    ->get();

                foreach ($treinosComExercicios as $treino) {
                    foreach ($treino->exercicios as $exercicio) {
                        $exerciciosArray[] = [
                            'nome' => $exercicio->nome,
                            'quantidade_de_repeticoes' => $exercicio->quantidade_de_repeticoes,
                        ];
                    }
                }
            }

            return view('aluno.exercicios', ['dados' => $exerciciosArray],['treino_id'=>$treino_id]);

        } catch (\Exception $e) {
            Log::error('Erro ao buscar treinos do aluno: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erro ao buscar treinos do aluno!'.$e->getMessage());
        }
    }

    public function addProgresso($id_aluno,$id_treino){
        try{
            $progresso = Progresso::where('aluno_id',$id_aluno)
                        ->where('treino_id',$id_treino)->first();
            if($progresso){
                $progresso->progresso = $progresso->progresso + 1;
                $progresso->save();
            }
            else{
                Progresso::create([
                    'aluno_id' => $id_aluno,
                    'treino_id' => $id_treino,
                    'data' => now(),
                    'progresso' => 1
                ]);
            }
            return redirect()->route('aluno.treino')->with('success','Treino concluido com sucesso!');
        }
        catch(\Exception $e){
            return redirect()
            ->route('aluno.getExercicios',['aluno_id'=>$id_aluno,'treino_id'=>$id_treino])
            ->with('error', 'Ocorreu um erro ao concluir o treino'.$e->getMessage());
        }
        
    }

    public function getProgresso($id_aluno){
        $progresso = Progresso::where('aluno_id',$id_aluno)
        ->with('treino')->get();
        return view('aluno.progresso',compact('progresso'));
    }
}