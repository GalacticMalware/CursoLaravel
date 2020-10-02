<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Tag extends Model
{
    protected $fillable = ['texto'];

    public function messages(){
        return $this->morphedByMany(Message::class,'taggable');
    }

    public function users(){
        return $this->morphedByMany(User::class,'taggable');
    }
}
