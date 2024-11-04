<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    protected $table = 'exercicio';

    protected $fillable = [
       'nome',
       'link_de_visualizacao',
       'id',
       'quantidade_de_repeticoes'
    ];

    public function treinos()
    {
        return $this->belongsToMany(Treino::class, 'treino_exercicio', 'exercicio_id', 'treino_id');
    }
}