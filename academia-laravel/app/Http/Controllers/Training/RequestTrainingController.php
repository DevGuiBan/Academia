<?php

namespace App\Http\Controllers\Training;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\RequestTraining;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class RequestTrainingController extends Controller
{
    public function store(Request $request,int $id){
        try{
            $student = User::find($id);
            $personal = User::find($request->users);
            $training = Training::find($request->musculo);

            RequestTraining::create([
                'id_aluno' => $student->id,
                'id_personal' => $personal->id,
                'id_treino' => $training->id,
            ]);

            Notification::create([
                'id_personal' => $personal->id,
                'id_aluno' => $student->id,
                'id_treino' => $training->id,
                'mensagem' => 'Nova solicitação de treino de ' . $student->name . '<br>' . 'Treino de ' . $training->musculo . ' : ' . $training->tipo_de_treino,
            ]);
    
            $request->session()->put('user_id', $student->id);
        
            return redirect()->route('student.training',['id'=>$student->id])->with('success', 'Request completed successfully!');
        }
        catch(\Exception $e){
            return redirect()->route('student.training',['id'=>$student->id])->with('error', 'Unable to request training: ' . $e->getMessage());
        }
    }

    public function indexCreateRequests(){
        $personal = User::all()->where('role',"=",'personal');
        $trainings = Training::all();
        
        return view('students.requestTraining',compact('personal', 'trainings'));
    }

    public function indexStudents($id_personal){
        $requests = RequestTraining::where('id_personal',$id_personal)
        ->with('alunos')->get();
        

        return view('personal.students', compact('requests'));
    }
    
    public function index(){
        $personalId = auth()->id();

        $requests = RequestTraining::with('treino')->get();

        $notifications = Notification::where('id_personal', $personalId)
                               ->where('lida', false)
                               ->get();

        return view('personal.training', compact('notifications','requests'));
    }

    public function destroy($id){
        $request = RequestTraining::find($id);

        if (!$request) {
            return redirect()->route('personal.training')->with('error', 'Training request not found.');
        }

        try {
            $request->delete();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('personal.training')->with('error', 'Unable to delete your request.');
        }

        return redirect()->route('personal.training')->with('success', 'The request was deleted successfully!');
    }
    
}
