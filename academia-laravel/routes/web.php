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

Route::get('/teste', function(){
    return view('teste');
})->middleware(['auth']);

Route::post('/sign-in',[AuthController::class, 'register'])->name('sign-in');
// tem que ajeitar esse rota
Route::post('/authenticate',[AuthController::class, 'login'])->name('authenticate');

Route::get('/logout',[AuthController::class, 'logout']);

// testes -> rota de personal
Route::get('/personal/alunos',function(){
    return view('personal.alunos');
});

Route::get('/personal/horario',function(){
    return view('horario');
});

Route::get('/personal/exercicio',function(){
    return view('personal.exercicio');
});

Route::get('/personal/salvar-exercicio',function(){
    return view('personal.salvarExercicio');
});

Route::get('/personal/salvar-treino',function(){
    return view('personal.salvarTreino');
});

Route::get('/personal/treino',function(){
    return view('personal.treino');
});

// testes aluno


Route::get('/aluno/treino' ,function(){
    return view('aluno.treino');
});

Route::get('/aluno/solicitar-treino', function(){
    return view('aluno.solicitarTreino');
});

Route::get('/aluno/progresso', function(){
    return view('aluno.progresso');
});

Route::get('/aluno/horario', function(){
    return view('aluno.horario');
});

