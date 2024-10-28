<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'name',
        'aluno_id',
        'address',
        'password',
        'email',
        'address',
        'plan'
    ];

    
}
