<?php

namespace App\Http\Controllers\Treino;
use App\Models\Notificacao;
use App\Http\Controllers\Controller;

class NotificacaoController extends Controller{
    public function marcarComoLida($id,$aluno_id,$personal_id,$treino_id){
    $notificacao = Notificacao::findOrFail($id);
    $notificacao->update(['lida' => true]);

    return redirect()->route('personal.selecionarExercicios',['aluno_id' => $aluno_id, 'personal_id' => $personal_id, 'treino_id' => $treino_id]);
    }
}