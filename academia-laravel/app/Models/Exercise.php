<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
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
        return $this->belongsToMany(Training::class, 'treino_exercicio', 'exercicio_id', 'treino_id');
    }
}