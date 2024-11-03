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
}
