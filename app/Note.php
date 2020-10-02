<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['body'];

    public function notable(){
        //return $this->belongsTo(Message::class);
        return $this->morphTo(); //Relacion con polimorfismo
    }
}
 