<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    protected $fillable = [
       'nome',
       'link_visualizacao',
       'id',
       'id_treinoFK',
       'rep_min'];

       public function Treino(){
        return $this -> belongsTo(Treino::class);
       }
       

}
