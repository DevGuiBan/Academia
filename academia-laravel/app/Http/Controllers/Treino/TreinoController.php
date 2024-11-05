<?php

namespace App\Http\Controllers\Treino;

use App\Models\Treino;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class TreinoController extends Controller{
    public function store(Request $request, int $id){
        $personal = User::findOrFail($id);

        $request->validate([
            'musculo' =>'required|string',
            'tipo_treino' =>'required|string',
        ]);

        Treino::create([
            'musculo' => $request->musculo,
            'tipo_treino' => $request->tipo_treino,
            'personal_id' => $personal->id,
        ]);

        return redirect()->back()->with('success','Treino Criado com sucesso!');
    }

    public function index(){
        return view('personal.criarTreino');
    }

    public function update(Request $request, int $id){
        $treino = Treino::findOrFail($id);
        
        $request->validate([
            'musculo' =>'required|string',
            'tipo_de_treino' =>'required|string',
        ]);

        $treino->musculo = $request->musculo;
        $treino->tipo_de_treino = $request->tipo_de_treino;
        $treino->save();

        return redirect()->route('personal.treino')->with('success','Treino Atualizado com sucesso!');
    }

    public function edit($id){
        $treino = Treino::findOrFail($id);
        return view('personal.criarTreino', compact('treino'));
    }

    public function destroy($id){
        $treino = Treino::findOrFail($id);

        try{
            $treino->delete();
            return redirect()->route('personal.treino')->with('success', 'Treino deletado com sucesso!');
        } 
        catch(\Exception $e){
            Log::error('Erro ao deletar treino: '.$e->getMessage());
            return redirect()->route('personal.treino')->with('erro', 'Erro ao deletar execício.');
        }
    }
}
