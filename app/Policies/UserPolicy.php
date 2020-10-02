<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

     //POliticas, todas las politicas tiene que tener los mismos nombre de las funciones sea una CRUD o no.
    public function __construct()
    {
    
    }

    public function before($user, $ability){  //se ejecutara antes que todos
        //if($user->hasRoles(['admin'])){ //Sin modo User MOdel
        if($user->isAdmin()){   //Modo de UserModel
            return true;
        }
    }

    public function edit(User $authUser, User $user){
        return $authUser->id == $user->id; //conincidencia de id para poder ser el usuario quien edita

    }

    public function update(User $authUser, User $user){
        return $authUser->id == $user->id;
    }

    public function destroy(User $authUser, User $user){
        return $authUser->id == $user->id;
    }
}
