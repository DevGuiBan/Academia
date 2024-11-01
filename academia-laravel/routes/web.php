<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\AuthController;

Route::get('/', function () {
    return view('welcome');
});

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
        Route::get('/alunos', function () {
            return view('personal.alunos');
        });
        
        Route::get('/horario', function () {
            return view('personal.horario');
        });
        
        Route::get('/exercicio', function () {
            return view('personal.exercicio');
        });
        
        Route::get('/salvar-exercicio', function () {
            return view('personal.salvarExercicio');
        });
        
        Route::get('/salvar-treino', function () {
            return view('personal.salvarTreino');
        });
        
        Route::get('/treino', function () {
            return view('personal.treino');
        });
    });

    Route::prefix('aluno')->group(function () {
        Route::get('/treino', function () {
            return view('aluno.treino');
        });
        
        Route::get('/solicitar-treino', function () {
            return view('aluno.solicitarTreino');
        });
        
        Route::get('/progresso', function () {
            return view('aluno.progresso');
        });
        
        Route::get('/horario', function () {
            return view('aluno.horario');
        });
    });
});