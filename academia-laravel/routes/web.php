<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\Users\StudentController;
use App\Http\Controllers\Users\PersonalController;
use App\Http\Controllers\Training\RequestTrainingController;
use App\Http\Controllers\Training\TrainingExerciseController;
use App\Http\Controllers\Training\ExerciseController;
use App\Http\Controllers\Training\StudentTrainingController;
use App\Http\Controllers\Training\TrainingController;
use App\Http\Controllers\Training\NotificationController;

Route::get('/', function () {
    return view('landing.landingpage');
})->name('homepage');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/passwordrequest', function () {
    return view('passwordrequest');
})->name('password.request');

// Envio do link de recuperação de senha
Route::post('/password/email', [AuthController::class, 'sendResetLink'])->name('password.email');

// Formulário de redefinição de senha
Route::get('/password/reset/{token}', function ($token) {
    return view('passwordreset', ['token' => $token]);
})->name('password.reset');

// Submissão para redefinir senha
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.update');

Route::post('/sign-in', [AuthController::class, 'register'])->name('sign-in');
Route::post('/authenticate', [AuthController::class, 'login'])->name('authenticate');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('personal')->group(function () {
        Route::get('/students/{id_personal}',[RequestTrainingController::class,'indexStudents'])
        ->name('personal.students');
        
        Route::get('/time', function () {
            return view('personal.time');
        });
        
        Route::get('/{id}/exercise', [PersonalController::class, 'getTrainingOfPersonal'])
        ->name('personal.exercises');

        Route::post('/save-exercise', [ExerciseController::class, 'store'])
        ->name('personal.createExercise');
        
        Route::post('/save-exercise/{training_id}/{exercicio_id}', [TrainingExerciseController::class, 'salvarExercicio'])
        ->name('personal.saveExercise');

        Route::put('/save-exercise/{personal_id}/{id}',[ExerciseController::class, 'update'])
        ->name('personal.updateExercise');

        Route::delete('/delete-exercise/{id}',[ExerciseController::class,'destroy'])
        ->name('personal.deleteExercise');
        
        Route::get('/save-exercise',[ExerciseController::class, 'index'])
        ->name('personal.exercise');

        Route::get('/save-exercise/edit/{id}',[ExerciseController::class, 'edit'])
        ->name('personal.exerciseEdit');

        Route::post('/select-exercises/{student_id}/{personal_id}/{training_id}', [TrainingExerciseController::class, 'store'])
        ->name('personal.selectExercisesStore');

        Route::get('/save-training/edit/{training_id}', [TrainingController::class, 'edit'])
        ->name('personal.saveTraining');

        Route::get('/training/create',[TrainingController::class,'index'])
        ->name('personal.createTraining');

        Route::put('/save-training/{training_id}',[TrainingController::class,'update'])
        ->name('personal.updateTraining');

        Route::delete('/delete/training/{id}',[TrainingController::class,'destroy'])
        ->name('personal.deleteTraining');

        Route::get('/select-exercises/{student_id}/{personal_id}/{training_id}', [TrainingExerciseController::class, 'selectExercise'])
        ->name('personal.selectExercises');

        Route::post('/training/create/{id}',[TrainingController::class,'store'])
        ->name('personal.create');

        Route::put('/training/edit/{id}', [StudentTrainingController::class, 'edit']
        )->name('personal.editTraining');
        
        Route::get('/training', [RequestTrainingController::class, 'index']
        )->name('personal.training');

        Route::post('/notification/{id}/read/{student_id}/{personal_id}/{training_id}', [NotificationController::class, 'markAsRead'])
        ->name('notification.read');

        Route::get('/profile/{id}',[PersonalController::class,'profile'])
        ->name('personal.profile');

        Route::delete('/profile/{id}',[PersonalController::class,'destroy'])
        ->name('personal.delete');

        Route::put('/profile/{id}',[PersonalController::class,'update'])
        ->name('personal.update');
    });

    Route::prefix('student')->group(function () {
        Route::get('/training/{id}', [StudentTrainingController::class,'index'])
        ->name('student.training');

        Route::get('/search-personal', [StudentController::class,'search'])
        ->name('student.searchPersonal');

        Route::get('/exercises/{student_id}/{training_id}', [StudentTrainingController::class,'getStudentTraining'])
        ->name('student.getExercise');

        Route::get('/exercise/conclude-training/{student_id}/{training_id}',[StudentTrainingController::class, 'addProgress'])
        ->name('student.concludeTraining');

        Route::get('/download-pdf/{student_id}/{training_id}', [StudentTrainingController::class, 'downloadTrainingPdf'])
        ->name('student.downloadPdf');

        Route::get('/profile/{id}',[StudentController::class,'profile'])
        ->name('student.profile');

        Route::put('/profile/{id}',[StudentController::class,'update'])
        ->name('student.update');

        Route::delete('/profile/{id}',[StudentController::class,'destroy'])
        ->name('student.delete');
        
        Route::get('/request-training', [RequestTrainingController::class, 'indexCreateRequests'])
        ->name('student.requestTraining');

        Route::post('/request-training/{id}',[RequestTrainingController::class,'store'])
        ->name('student.request-training');
        
        Route::get('/progress/{student_id}', [StudentTrainingController::class,'getProgress'])
        ->name('student.progress');
        
        Route::get('/time', function () {
            return view('students.time');
        });
    });
});