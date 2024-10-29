<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progresso extends Model
{
    protected $fillable = [

        'id',
        'id_aluno',
        'data',
        'detalhes_treino'
    ];

    public function aluno(){
        return $this->belongsTo('App\Models\Aluno');
    }
}
