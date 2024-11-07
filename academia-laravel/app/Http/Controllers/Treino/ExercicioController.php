<?php

namespace App\Http\Controllers\Treino;

use App\Models\Exercicio;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ExercicioController extends Controller{
    public function store(Request $request){
        try{
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
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Erro ao cadastrar exercício: ' . $e->getMessage());
        }
    }

    public function index(){
        return view('personal.salvarExercicio');
    }

    public function destroy($id){
        $exercicio = Exercicio::findOrFail($id);
        try{
            $exercicio->delete();
            return redirect()->route('personal.exercicio')->with('success','Exercicio Deletado com Sucesso!');
        }
        catch(\Exception $e){
            Log::error('Erro ao deletar exercício: '.$e->getMessage());
            return redirect()->route('personal.exercicio')->with('error','Erro ao deletar exercício.');
        }
    }

    public function update(Request $request, $id,$personal_id){
        try{
            $exercicio = Exercicio::findOrFail($id);
            
            $request->validate([
                'nome' => ['required', 'string'],
                'link' => ['required'],
                'repeticoes' => ['required'],
            ]);

            $exercicio->nome = $request->nome;
            $exercicio->link_visualizacao = $request->link_visualizacao;
            $exercicio->rep_min = $request->rep_min;
            $exercicio->save();

            return redirect()->route('personal.exercicios',['id'=>$personal_id])->with('sucess', 'Exercício atualizado com sucesso!');
        }    
        catch(\Exception $e){
            return redirect()->route('personal.exercicios',['id'=>$personal_id])->with('error', 'Erro ao atualizar o exercício' . $e->getMessage());
        }
    }

    public function edit($id){
        $exercicio = Exercicio::findOrFail($id);
        return view('personal.salvarExercicio',compact('exercicio'));
    }

}