<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TreinoExercicio extends Model
{
    protected $table = 'treino_exercicio';
    protected $fillable = [
        'treino_id',
        'exercicio_id'
    ];

    public function treino()
    {
        return $this->belongsTo(Treino::class, 'treino_id');
    }

    public function exercicio()
    {
        return $this->belongsTo(Exercicio::class, 'exercicio_id');
    }
}
