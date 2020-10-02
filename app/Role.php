<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user()
    {
        //hasOne devuelve un usuario   ||| hasMany devuelve el array de usuarios
        return $this->hasOne(User::class);
    }

    protected $table = 'roles';

    protected $fillable = [
        'key', 'name', 'description',
    ];

    
}
