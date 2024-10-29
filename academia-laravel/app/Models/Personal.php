<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $fillable = [
        'nome',
        'personal_id',
        'endereco',
        'password',
        'email',
        'estagio',
        'contrato'
    ];

    public function aluno()
    {
        return $this->hasMany(Aluno::class);
    }
}
