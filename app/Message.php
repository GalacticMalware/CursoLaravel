<?php

namespace App;

use App\Presenters\MessagesPresenters;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table="messages";

    protected $fillable= [
        'name' , 'email' , 'subject', 'content' , 'user_id'
    ];

    //funcion que nos devuelve los datos de USER con respecto a la relacion definida en la DB  
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function note()
    {
        //eturn $this->hasOne(Note::class);
        return $this->morphMany(Note::class,'notable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }

   public function present(){
       return new MessagesPresenters($this);
   }
}
