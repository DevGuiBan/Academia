<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentTraining extends Model
{

    protected $table = 'aluno_treino';
    protected $fillable = [
        'aluno_id',
        'treino_id'
    ];

    public function aluno()
    {
        return $this->belongsTo(User::class, 'aluno_id');
    }

    public function treino()
    {
        return $this->belongsTo(Training::class, 'treino_id');
    }
}
