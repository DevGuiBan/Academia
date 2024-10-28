<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    protected $fillable = [
       'nome',
       'link_visualizacao',
       'id_exercicio',
       'id_treinoFK',
       'rep_min'];
       

}
