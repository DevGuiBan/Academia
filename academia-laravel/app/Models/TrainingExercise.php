<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingExercise extends Model
{
    protected $table = 'treino_exercicio';
    
    protected $fillable = [
        'treino_id',
        'exercicio_id'
    ];

    public function treino()
    {
        return $this->belongsTo(Training::class, 'treino_id');
    }

    public function exercicio()
    {
        return $this->belongsTo(Exercise::class, 'exercicio_id');
    }
}
