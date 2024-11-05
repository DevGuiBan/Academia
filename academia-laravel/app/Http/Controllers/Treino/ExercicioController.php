<?php

namespace App\Http\Controllers\Treino;

use App\Models\Exercicio;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ExercicioController extends Controller{
    public function store(Request $request){
        $request->validate([
            'nome' => 'required|string',
            'repeticoes' => 'required|string',
            'link' => 'required|string',
        ]);

        Exercicio::create([
            'nome' => $request->nome,
            'quantidade_de_repeticoes' => $request->repeticoes,
            'link_de_visualizacao' => $request->link
        ]);

        return redirect()->route('personal.treino')->with('success','Exercicio Cadastrado com sucesso!');
    }

    public function index(){
        return view('personal.salvarExercicio');
    }

    public function destroy($id){
        $exercicio = Exercicio::findOrFail($id);
        try{
            $exercicio->delete();
            return redirect()->route('personal.exercicio')->with('success','Exercicio Deletado com Sucesso');
        }
        catch(\Exception $e){
            Log::error('Erro ao deletar exercício: '.$e->getMessage());
            return redirect()->route('personal.exercicio')->with('error','Erro ao deletar exercício');
        }
    }

    public function update(Request $request, $id){
        $exercicio = Exercicio::find($id);
        
        $request->validate([
            'nome' => ['required', 'string'],
            'link_visualizacao' => ['required', 'url'],
            'rep_min' => ['required', 'integer'],
        ]);

        $exercicio->nome = $request->nome;
        $exercicio->link_visualizacao = $request->link_visualizacao;
        $exercicio->rep_min = $request->rep_min;
        $exercicio->save();

        return redirect('personal/exercicio')->with('sucess', 'Exercício atualizado com sucesso!');
    }

    public function edit($id){
        $exercicio = Exercicio::find($id);
        return view('personal.salvarExercicio',compact('exercicio'));
    }

}