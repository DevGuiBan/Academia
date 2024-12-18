<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notificacoes';

    protected $fillable = ['id','id_personal', 'id_aluno', 'id_treino', 'mensagem', 'lida'];
}