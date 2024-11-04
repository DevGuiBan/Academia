<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Treino extends Model
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
        return $this->belongsToMany(Exercicio::class, 'treino_exercicio', 'treino_id', 'exercicio_id');
    }

    public function personal()
    {
        return $this->belongsTo(User::class, 'id_personal');
    }

    public function progresso()
    {
        return $this->hasMany(Progresso::class, 'id');
    }

    public function alunos()
{
    return $this->belongsToMany(User::class, 'aluno_treinos', 'treino_id', 'aluno_id');
}
}
