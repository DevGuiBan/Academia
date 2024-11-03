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
            'repeticoes' => $request->repeticoes,
            'link' => $request->link
        ]);

        return redirect()->route('personal.treino')->with('success','Exercicio Cadastrado com sucesso');
    }

    public function index(){
        return view('personal.salvarExercicio');
    }

    public function destroy($id){
        $exercicio = Exercicio::findOrFail($id);
        $exercicio->delete();
    }

}