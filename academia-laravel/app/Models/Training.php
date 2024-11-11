<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Training extends Model
{
    protected $table = 'treino';

    protected $fillable = [
        'id',
        'musculo',
        'personal_id',
        'tipo_de_treino'
    ];

    public function exercicios()
    {
        return $this->belongsToMany(Exercise::class, 'treino_exercicio', 'treino_id', 'exercicio_id');
    }

    public function personal()
    {
        return $this->belongsTo(User::class, 'id_personal');
    }

    public function progresso()
    {
        return $this->hasMany(Progress::class, 'treino_id');
    }

    public function alunos()
{
    return $this->belongsToMany(User::class, 'aluno_treinos', 'treino_id', 'aluno_id');
}
}
