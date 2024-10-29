<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensalidade extends Model
{
    protected $fillable = [
        'id',
        'id_aluno',
        'status',
        'data_pagamento',
        'valor',
        'id_plano',
        'forma_pagamento'
    ];

    public function aluno(){
        return $this->belongsTo(Aluno::class);
    }

}
