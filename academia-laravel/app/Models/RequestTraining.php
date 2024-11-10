<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestTraining extends Model
{

    protected $table = 'solicitar_treino';
    protected $fillable = [
        'id_aluno',
        'id_personal',
        'id_treino'
    ];

    public function alunos()
    {
        return $this->belongsTo(User::class, 'id_aluno');
    }

    public function personal(){
        return $this->belongsTo(User::class, 'id_personal');
    }

    public function treino()
    {
        return $this->belongsTo(Training::class, 'id_treino');
    }
}
