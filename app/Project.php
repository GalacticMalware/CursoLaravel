<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
   // protected $table = '';

   protected $fillable  = ['title','description'];

   protected $guarded = [];
   
   public function getRouteKeyName(){
      return 'title';
   }
}
