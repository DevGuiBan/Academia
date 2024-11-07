<?php

namespace App\Http\Controllers\Treino;

use App\Models\Notificacao;
use App\Models\User;
use App\Models\SolicitarTreino;
use App\Models\Treino;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class SolicitarTreinoController extends Controller
{
    public function store(Request $request,int $id){
        try{
            $aluno = User::find($id);
            $personal = User::find($request->users);
            $treino = Treino::find($request->musculo);

            SolicitarTreino::create([
                'id_aluno' => $aluno->id,
                'id_personal' => $personal->id,
                'id_treino' => $treino->id,
            ]);

            Notificacao::create([
                'id_personal' => $personal->id,
                'id_aluno' => $aluno->id,
                'id_treino' => $treino->id,
                'mensagem' => 'Nova solicitação de treino de ' . $aluno->name,
            ]);
    
            $request->session()->put('user_id', $aluno->id);
        
            return redirect()->route('aluno.treino')->with('success', 'Solicitação realizada com sucesso!');
        }
        catch(\Exception $e){
            return redirect()->route('alunos.treino')->with('error', 'Não foi possível solicitar treino: ' . $e->getMessage());
        }
    }

    public function indexCreateSolicities(){
        $personal = User::all()->where('role',"=",'personal');
        $treinos = Treino::all();
        
        return view('aluno.solicitarTreino',compact('personal', 'treinos'));
    }

    public function indexAlunos($id_personal){
        $solicitacoes = SolicitarTreino::where('id_personal',$id_personal)
        ->with('alunos')->get();
        

        return view('personal.alunos', compact('solicitacoes'));
    }
    
    public function index(){
        $personalId = auth()->id();

        $solicitacoes = SolicitarTreino::with('treino')->get();

        $notificacoes = Notificacao::where('id_personal', $personalId)
                               ->where('lida', false)
                               ->get();

        return view('personal.treino', compact('notificacoes','solicitacoes'));
    }

    public function destroy($id){
        $solicitacao = SolicitarTreino::find($id);

        if (!$solicitacao) {
            return redirect()->route('personal.treino')->with('error', 'Solicitação de treino não encontrada.');
        }

        try {
            $solicitacao->delete();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('personal.treino')->with('error', 'Não foi possível excluir sua conta.');
        }

        return redirect()->route('personal.treino')->with('success', 'A solicitação foi excluída com sucesso!');
    }
    
}
