<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treino extends Model
{
    protected $fillable = [
        'id',
        'id_aluno',
        'id_personal',
        'tipo_treino',
        'data'];

        public function Aluno(){
            return $this->belongsTo(Aluno::class, 'id_aluno');
        }

        public function Personal(){
            return $this->belongsTo(Personal::class, 'id_personal');
        }

        public function Progresso(){
            return $this->hasMany(Progresso::class, 'id_treino');
        }

        public function Exercicio(){
            return $this->hasMany(TreinoExercicio::class, 'treino_id');
        }
}
