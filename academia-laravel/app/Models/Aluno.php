<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Aluno extends Model
{
    protected $fillable = [
        'nome',
        'id',
        'endereco',
        'password',
        'email',
        'plano'
    ];

    public function plano()
    {
        return $this->belongsTo(Plano::class);
    }

    public function setPasswordAluno($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

}
