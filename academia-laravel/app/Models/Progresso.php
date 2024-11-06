<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Progresso extends Model
{
    protected $table = 'progresso';

    protected $fillable = [

        'id',
        'id_aluno',
        'data',
    ];

    public function aluno(){
        return $this->belongsTo(User::class,'id_aluno');
    }
}
