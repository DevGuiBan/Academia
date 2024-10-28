<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treino extends Model
{
    protected $fillable = [
        'id_treino',
        'id_AlunoFK',
        'id_PersonalFK',
        'tipo_treino',
        'data'];
}
