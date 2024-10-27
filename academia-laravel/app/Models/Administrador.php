<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table = 'administrador';
     protected $fillable = [
         'nome',
         'email',
         'password',
     ];
 
     /**
      * The attributes that should be hidden for serialization.
      *
      * @var array<int, string>
      */
     protected $hidden = [
         'password',
     ];
 
     /**
      * Get the attributes that should be cast.
      *
      * @return array<string, string>
      */
     protected function casts(): array
     {
         return [
             'password' => 'hashed',
         ];
     }
}
