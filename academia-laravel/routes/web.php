<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\Users\AlunoController;
use App\Http\Controllers\Users\PersonalController;
use App\Http\Controllers\Treino\SolicitarTreinoController;
use App\Http\Controllers\Treino\TreinoExercicioController;
use App\Http\Controllers\Treino\ExercicioController;
use App\Http\Controllers\Treino\AlunoTreinoController;
use App\Http\Controllers\Treino\TreinoController;
use App\Http\Controllers\Treino\NotificacaoController;

Route::get('/', function () {
    return view('landing.landingpage');
})->name('homepage');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/sign-in', [AuthController::class, 'register'])->name('sign-in');
Route::post('/authenticate', [AuthController::class, 'login'])->name('authenticate');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::prefix('personal')->group(function () {
        Route::get('/alunos/{id_personal}',[SolicitarTreinoController::class,'indexAlunos'])
        ->name('personal.alunos');
        
        Route::get('/horario', function () {
            return view('personal.horario');
        });
        
        Route::get('/{id}/exercicio', [PersonalController::class, 'getTreinosDoPersonal'])
        ->name('personal.exercicios');

        Route::post('/salvar-exercicio', [ExercicioController::class, 'store'])
        ->name('personal.createExercicio');
        
        Route::post('/salvar-exercicio/{treino_id}/{exercicio_id}', [TreinoExercicioController::class, 'salvarExercicio'])
        ->name('personal.salvarExercicio');

        Route::put('/salvar-exercicio/{personal_id}/{id}',[ExercicioController::class, 'update'])
        ->name('personal.updateExercicio');

        Route::delete('/delete-exercicio/{id}',[ExercicioController::class,'destroy'])
        ->name('personal.deleteExercicio');
        
        Route::get('/salvar-exercicio',[ExercicioController::class, 'index'])
        ->name('personal.exercicio');

        Route::get('/salvar-exercicio/edit/{id}',[ExercicioController::class, 'edit'])
        ->name('personal.exercicioEdit');

        Route::post('/selecionar-exercicios/{aluno_id}/{personal_id}/{treino_id}', [TreinoExercicioController::class, 'store'])
        ->name('personal.selecionarExerciciosStore');

        Route::get('/salvar-treino/edit/{treino_id}', [TreinoController::class, 'edit'])
        ->name('personal.salvarTreino');

        Route::get('/treino/create',[TreinoController::class,'index'])
        ->name('personal.criarTreino');

        Route::put('/salvar-treino/{treino_id}',[TreinoController::class,'update'])
        ->name('personal.updateTreino');

        Route::get('/selecionar-exercicios/{aluno_id}/{personal_id}/{treino_id}', [TreinoExercicioController::class, 'selecionarExercicios'])
        ->name('personal.selecionarExercicios');

        Route::post('/treino/create/{id}',[TreinoController::class,'store'])
        ->name('personal.create');

        Route::put('/treino/edit/{id}', [AlunoTreinoController::class, 'edit']
        )->name('personal.editTreino');
        
        Route::get('/treino', [SolicitarTreinoController::class, 'index']
        )->name('personal.treino');

        Route::post('/notificacao/{id}/lida/{aluno_id}/{personal_id}/{treino_id}', [NotificacaoController::class, 'marcarComoLida'])
        ->name('notificacao.lida');

        Route::get('/profile/{id}',[PersonalController::class,'profile'])
        ->name('personal.profile');

        Route::delete('/profile/{id}',[PersonalController::class,'destroy'])
        ->name('personal.delete');

        Route::put('/profile/{id}',[PersonalController::class,'update'])
        ->name('personal.update');
    });

    Route::prefix('aluno')->group(function () {
        Route::get('/treino', [AlunoTreinoController::class,'index'])
        ->name('aluno.treino');

        Route::get('/exercicios/{aluno_id}/{treino_id}', [AlunoTreinoController::class,'getAlunoTreino'])
        ->name('aluno.getExercicios');

        Route::get('/exercicio/concluir-treino/{id_aluno}/{id_treino}',[AlunoTreinoController::class, 'addProgresso'])
        ->name('aluno.concluirTreino');

        Route::get('/profile/{id}',[AlunoController::class,'profile'])
        ->name('aluno.profile');

        Route::put('/profile/{id}',[AlunoController::class,'update'])
        ->name('aluno.update');

        Route::delete('/profile/{id}',[AlunoController::class,'destroy'])
        ->name('aluno.delete');
        
        Route::get('/solicitar-treino', [SolicitarTreinoController::class, 'indexCreateSolicities'])
        ->name('aluno.solicitarTreino');

        Route::post('/solicitar-treino/{id}',[SolicitarTreinoController::class,'store'])
        ->name('solicitar-treino');
        
        Route::get('/progresso/{aluno_id}', [AlunoTreinoController::class,'getProgresso'])
        ->name('aluno.progresso');
        
        Route::get('/horario', function () {
            return view('aluno.horario');
        });
    });
});