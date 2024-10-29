<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $fillable = [
        'id',
        'preco',
        'nome',
    ];

   public function Mensalidade(){
    return $this->hasOne(Mensalidade::class, 'id_plano', 'id');
}
}
