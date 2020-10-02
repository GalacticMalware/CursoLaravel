<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Presenters\UserPresentar;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        //belongsTo Relaciones de uno a uno
        //belongsToMeny Relacion de mucho a mucho
        return $this->belongsToMany(Role::class, 'assigned_roles');
    }

    public function hasRoles(array $roles)
    {
        //return $this->role == $role;
        /*foreach ($roles as $role){ Declaratoria para pasar rol de unos por uno, solo cuando es relacion de uno a uno
            if($this->roles->key == $role){
                return true;
            }
        }*/

        /*foreach ($roles as $role) {
            foreach ($this->roles as $userRole) {  Comparacion de roles de unos por unos hazta que de true o false
                if ($userRole->key == $role) {          [Admin,Mod,Otro...] metodo burbuja
                    return true;
                }
            }
        }
        return false;
        */
       // var_dump($this->roles->pluck('key')->intersect($roles)->count());  //Metodo Collection, minimizar la estructura
        return $this->roles->pluck('key')->intersect($roles)->count();
    }

    public function isAdmin()
    {
        return $this->hasRoles(['Admin']);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function getRouteKeyName(){
        return 'id';
     }

     public function user()
    {
        //hasOne devuelve un usuario   ||| hasMany devuelve el array de usuarios
        return $this->hasOne(User::class);
    }

    public function note()
    {
        //eturn $this->hasOne(Note::class);
        return $this->morphMany(Note::class,'notable'); //Relacion polimorfica de muchos a muchos
    }
    public function tags(){
        return $this->morphToMany(Tag::class,'taggable')->withTimestamps();
    }

    public function present(){
        return new UserPresentar($this);
    }
}
