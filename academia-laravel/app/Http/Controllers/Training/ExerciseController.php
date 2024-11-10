<?php

namespace App\Http\Controllers\Training;

use App\Models\Exercise;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ExerciseController extends Controller{
    public function store(Request $request){
        try{
            $request->validate([
                'nome' => 'required|string',
                'repeticoes' => 'required|string',
                'link' => 'required|string',
            ]);

            Exercise::create([
                'nome' => $request->nome,
                'quantidade_de_repeticoes' => $request->repeticoes,
                'link_de_visualizacao' => $request->link
            ]);

            return redirect()->route('personal.training')->with('success','Exercise registred with success!');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Error while register this exercise: ' . $e->getMessage());
        }
    }

    public function index(){
        return view('personal.saveExercise');
    }

    public function destroy($id){
        $exercise = Exercise::findOrFail($id);
        try{
            $exercise->delete();
            return redirect()->route('personal.exercises')->with('success','Exercise deleted with success!');
        }
        catch(\Exception $e){
            Log::error('Error on delete exercise '.$e->getMessage());
            return redirect()->route('personal.exercises')->with('error','Errors when delete this exercise.');
        }
    }

    public function update(Request $request, $id,$personal_id){
        try{
            $exercise = Exercise::findOrFail($id);
            
            $request->validate([
                'nome' => ['required', 'string'],
                'link' => ['required'],
                'repeticoes' => ['required'],
            ]);

            $exercise->nome = $request->nome;
            $exercise->link_de_visualizacao = $request->link;
            $exercise->quantidade_de_repeticoes = $request->repeticoes;
            $exercise->save();

            return redirect()->route('personal.exercises',['id'=>$personal_id])->with('sucess', 'Exercise updated with success!');
        }    
        catch(\Exception $e){
            return redirect()->route('personal.exercises',['id'=>$personal_id])->with('error', 'Errors when updating this exercise' . $e->getMessage());
        }
    }

    public function edit($id){
        $exercise = Exercise::findOrFail($id);
        return view('personal.saveExercise',compact('exercise'));
    }

}