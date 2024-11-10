<?php

namespace App\Http\Controllers\Training;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class TrainingController extends Controller{
    public function store(Request $request, int $id){
        try{
            $personal = User::findOrFail($id);

            $request->validate([
                'musculo' =>'required|string',
                'tipo_de_treino' =>'required|string',
            ]);

            Training::create([
                'musculo' => $request->musculo,
                'tipo_de_treino' => $request->tipo_de_treino,
                'personal_id' => $personal->id,
            ]);

            return redirect()->back()->with('success','Training Created Successfully!');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Unable to create workout: ' . $e->getMessage());
        }
    }

    public function index(){
        return view('personal.createTraining');
    }

    public function update(Request $request, int $id){
        try{
            $treino = Training::findOrFail($id);
            
            $request->validate([
                'musculo' =>'required|string',
                'tipo_de_treino' =>'required|string',
            ]);

            $treino->musculo = $request->musculo;
            $treino->tipo_de_treino = $request->tipo_de_treino;
            $treino->save();

            return redirect()->route('personal.training')->with('success', 'Training Updated Successfully!');
        }
        catch(\Exception $e){
            return redirect()->route('personal.training')->with('error', 'Unable to update workout: ' . $e->getMessage());
        }
    }

    public function edit($id){
        $training = Training::findOrFail($id);
        return view('personal.createTraining', compact('training'));
    }

    public function destroy($id){
        $training = Training::findOrFail($id);

        try{
            $training->delete();
            return redirect()->route('personal.training')->with('success', 'Workout deleted successfully!');
        } 
        catch(\Exception $e){
            Log::error('Erro ao deletar treino: '.$e->getMessage());
            return redirect()->route('personal.training')->with('erro', 'Error deleting exercise.');
        }
    }
}
