<?php

namespace App\Http\Controllers\Treino;

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

            session()->put('nova_notificacao', [
                'id_personal' => $personal->id,
                'id_treino' => $treino->id,
                'id_aluno' => $aluno->id,
                'mensagem' => 'Nova solicitação de treino de ' . $aluno->name,
            ]);

            $request->session()->put('user_id', $aluno->id);

            return redirect()->route('alunos.treino')->with('success', value: 'Solicitação realizada com sucesso!');
        }
        catch(\Exception $e){
            return redirect()->route('alunos.treino')->with('error', value: 'Não foi possível solicitar treino: ' . $e->getMessage());
        }
    }

    public function indexCreateSolicities(){
        $personal = User::all()->where('role',"=",'personal');
        $treinos = Treino::all();
        
        return view('aluno.solicitarTreino',compact('personal', 'treinos'));
    }

    public function indexAlunos(){
        $solicitacoes = SolicitarTreino::with('alunos')->get();
        
        return view('personal.alunos', compact('solicitacoes'));
    }
    
    public function index(){
        $solicitacoes = SolicitarTreino::with('treino')->get();
        
        return view('personal.treino', compact('solicitacoes'));
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

    public function marcarNotificacaoComoLida() {
        session()->forget('nova_notificacao');
        return response()->json(['status' => 'Notificação lida']);
    }
    
}
