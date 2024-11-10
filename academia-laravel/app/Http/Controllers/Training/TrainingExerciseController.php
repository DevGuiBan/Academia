<?php

namespace App\Http\Controllers\Training;


use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\StudentTraining;
use App\Models\TrainingExercise;
use Illuminate\Http\Request;

class TrainingExerciseController extends Controller{
    public function store(Request $request, $student_id,$personal_id, $training_id){
        try{
            $request->validate([
                'exercicios' => 'required|array|min:1',
            ]);

            foreach ($request->input('exercises') as $exercises_id) {
                TrainingExercise::create([
                    'treino_id' => $training_id,
                    'exercicio_id' => $exercises_id,
                ]);
            }

            StudentTraining::create([
                'aluno_id' => $student_id,
                'treino_id' => $training_id,
            ]);

            return redirect()->route('personal.training')->with('success', 'Workout created successfully!');
        }
        catch(\Exception $e){
            return redirect()->route('personal.training')->with('error', 'Unable to create workout' . $e->getMessage());
        }
    }

    public function selectExercise($student_id, $personal_id, $training_id){
        $exercises = Exercise::all();

        return view('personal.saveTraining', compact('exercises', 'student_id', 'personal_id', 'training_id'));
    }
    
}