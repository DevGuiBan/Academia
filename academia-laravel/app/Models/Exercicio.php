<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    protected $table = 'exercicio';

    protected $fillable = [
       'nome',
       'link_visualizacao',
       'id',
       'rep_min'
    ];

    public function treinos()
    {
        return $this->belongsToMany(Treino::class, 'treino_exercicios', 'exercicio_id', 'treino_id');
    }
}