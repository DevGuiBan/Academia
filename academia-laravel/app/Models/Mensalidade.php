<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensalidade extends Model
{
    protected $fillable = [
        'mensalidade_id',
        'id_aluno',
        'status',
        'data_pagamento',
        'valor',
        'id_plano',
        'forma_pagamento'
    ];

}
