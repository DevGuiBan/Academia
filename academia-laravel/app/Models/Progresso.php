<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Progresso extends Model
{
    protected $table = 'progresso';

    protected $fillable = [
        'id',
        'aluno_id',
        'progresso',
        'treino_id',
        'data',
    ];

    public function aluno(){
        return $this->belongsTo(User::class,'aluno_id');
    }

    public function treino(){
        return $this->hasOne(Treino::class,'id');
    }
}
