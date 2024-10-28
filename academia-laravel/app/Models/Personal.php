<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $fillable = [
        'name',
        'personal_id',
        'address',
        'password',
        'email',
        'stage',
        'contract'
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
