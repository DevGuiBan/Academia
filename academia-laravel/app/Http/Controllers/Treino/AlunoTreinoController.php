<?php

namespace App\Http\Controllers\Treino;

use App\Models\AlunoTreino;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


class AlunoTreinoController extends Controller{
    public function index(){
        $treinos = AlunoTreino::with('treino')->get();
        return view('aluno.treino', compact('treinos'));
    }

    public function store(Request $requet){

    }

    public function update(Request $request, $id){

    }

    public function edit($id){
        
    }

    public function destroy($id){

    }
}