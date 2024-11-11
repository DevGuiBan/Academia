<?php

namespace App\Http\Controllers\Training;


use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Progress;
use App\Models\StudentTraining;
use App\Models\Training;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentTrainingController extends Controller
{
    public function index($student_id)
    {
        $trainings = StudentTraining::with('treino')
            ->where('aluno_id', $student_id)->get();
        $personals = User::all()->where('role', 'personal');

        return view('students.training', compact('trainings', 'personals'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'student_id' => ['required', 'exists:users,id'],
                'training_id' => ['required', 'exists:treinos,id']
            ]);

            StudentTraining::create([
                'aluno_id' => $request->student_id,
                'treino_id' => $request->training_id,
            ]);

            $student = User::find($request->user);

            return redirect()->back()->with('success', 'Training assigned to the student' . $student->name . 'with succss!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error assigning training to student: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $studentTraining = StudentTraining::findOrFail($id);

            $request->validate([
                'training_id' => ['required', 'exists:treinos,id'],
            ]);

            $studentTraining->treino_id = $request->training_id;
            $studentTraining->save();

            return redirect('personal/training')->with('sucess', 'Student training successfully updated!');
        } catch (\Exception $e) {
            return redirect('personal/training')->with('error', 'Unable to update workout: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $studentTraining = StudentTraining::find($id);
        $trainings = Training::all();

        return view('personal.editTraining', compact('studentTraining', 'trainings'));
    }

    public function destroy($id)
    {
        try {
            $studentTraining = StudentTraining::find($id);
            $studentTraining->delete();

            return redirect()->back()->with('success', 'Training successfully removed!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error removing workout: ' . $e->getMessage());
        }
    }
    public function getStudentTraining($student_id, $training_id)
    {
        try {
            $trainings = StudentTraining::where('aluno_id', $student_id)
                ->where('treino_id', $training_id)
                ->with('treino')
                ->get();

            $personals = [];
            foreach ($trainings as $training) {
                $personals[] = $training->treino->personal_id;
            }

            $exerciciosArray = [];
            foreach ($personals as $personalId) {
                $trainingWithExercise = Training::where('personal_id', $personalId)
                    ->where('id', $training_id)
                    ->with('exercicios')
                    ->get();

                foreach ($trainingWithExercise as $training) {
                    foreach ($training->exercicios as $exercise) {
                        $exercicioKey = $exercise->nome . $exercise->quantidade_de_repeticoes;
                        $exerciciosArray[$exercicioKey] = [
                            'nome' => $exercise->nome,
                            'quantidade_de_repeticoes' => $exercise->quantidade_de_repeticoes,
                        ];
                    }
                }
            }

            return view('students.exercises', ['dados' => $exerciciosArray], ['training_id' => $training_id]);
        } catch (\Exception $e) {
            Log::error('Error searching for student trainings: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error searching for student trainings!' . $e->getMessage());
        }
    }

    public function downloadTrainingPdf($student_id, $training_id)
    {
        try {
            // Buscar o aluno
            $student = User::findOrFail($student_id);

            // Buscar os treinos com os exercícios
            $trainings = StudentTraining::where('aluno_id', $student_id)
                ->where('treino_id', $training_id)
                ->with(['treino.exercicios'])
                ->get();

            $exerciciosArray = [];
            foreach ($trainings as $training) {
                foreach ($training->treino->exercicios as $exercise) {
                    $exerciciosArray[] = [
                        'nome' => $exercise->nome,
                        'quantidade_de_repeticoes' => $exercise->quantidade_de_repeticoes,
                    ];
                }
            }

            // Gerar o PDF com a view e os dados
            $pdf = Pdf::loadView('students.training-sheet', [
                'dados' => $exerciciosArray,
                'student' => $student,
            ]);

            // Nome do arquivo PDF
            $filename = 'ficha_treino_' . $student->name . '_' . $training_id . '.pdf';

            // Retornar o PDF para download
            return $pdf->download($filename);
        } catch (\Exception $e) {
            Log::error('Erro ao gerar PDF do treino: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erro ao gerar PDF do treino! ' . $e->getMessage());
        }
    }

    public function addProgress($student_id, $training_id)
    {
        try {
            $progress = Progress::where('aluno_id', $student_id)
                ->where('treino_id', $training_id)->first();
            if ($progress) {
                $progress->progresso = $progress->progresso + 1;
                $progress->save();
            } else {
                Progress::create([
                    'aluno_id' => $student_id,
                    'treino_id' => $training_id,
                    'data' => now(),
                    'progresso' => 1
                ]);
            }
            return redirect()->route('student.training', ['id' => $student_id])->with('success', 'Training conclude with success!');
        } catch (\Exception $e) {
            return redirect()
                ->route('student.getExercise', ['student_id' => $student_id, 'training_id' => $training_id])
                ->with('error', 'An error occurred while completing the training: ' . $e->getMessage());
        }
    }

    public function getProgress($student_id)
    {
        $progress = Progress::where('aluno_id', $student_id)
            ->with('treino')->get();
        return view('students.progress', compact('progress'));
    }
}
