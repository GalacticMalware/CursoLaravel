<?php

namespace App\Http\Controllers;
use App\Role;
use App\User;
use App\Repositories\Messages; //metodo repositorio
use App\Repositories\CacheMessages; //Metodo decorativo
use App\Http\Requests\CreateUserRequest;
use App\Message;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Repositories\MessagesInterface;

class RolesCRUD extends Controller
{

    protected $messages;

    public function __construct(MessagesInterface $messages)
    {
        $this->messages = $messages ;
    }
    
    public function index(Messages $mensajes)//REpositorio
    {
       // $RolesALl = Role::latest('updated_at')->get();

       // $prueba = response()->json(['roles' => $RolesALl]);
        
        //$prueba = json_encode($prueba->original);

        $mensajes = $mensajes->getPagination();//llama la funcion del repositorio importado
      
        $usuarios = User::with(['roles','note','tags'])->simplePaginate(10);
        //return $usuarios;
        /*$DatoCompleto = array(
            $RolesALl,
            $usuarios
        );*/

        ///segunda consulta por cache //FOREVER, ELIMINA LA EXPRIRACION DEL CACHE
        //tags() solo puede ser usado con noSql y configurar en .env
       

        //Primera consulta por cache
/////////////////////////////////////////////
       /* if(Cache::has($key))
        {
            $mensajes = Cache::get($key);
        }else{

        $mensajes = Message::with(['user','note','tags'])
        //->latest()
        ->orderBY('created_at', request('sorted','DESC'))
        ->paginate(10);

        Cache::put('messages.all',$mensajes,60);
        
        }*/

        /////////////////////////////////////////
        //return $mensajes;

        //print_r($prueba[0]->roles); // imprime los roles

        //$DatoCompleto = json_encode($DatoCompleto); //Devuelve los datos de json
       // dd(print_r($prueba["roles"])); 


    return view('roles.index', compact('usuarios','mensajes'));
    }

    
    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        // $this->messages->findById($id);

        $id = User::find($id);
        //return $id;
        return view('roles.show',[
            'user' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        Cache::remember("messages.{$id}",5,function() use ($id){
            return Message::findOrFail($id);
        });

        $roles = Role::pluck('name','id');

        $id = User::find($id);
       // return $id;
        return view('roles.edit',[
            'user'=> $id,
            'roles'=>$roles
        ]);

       
    }

   
    public function update(User $user, $id, CreateUserRequest $request)
    {
        Cache::flush();
        //return$request->roles;
        $user->update($request->validated());

        $user = User::findOrFail($id);
        //$user->roles()->attach($request->roles); // compara los roles obtenidos con los de la base de datos con el usuario
        $user->roles()->sync($request->roles);
        return redirect()->route('roles.index',$request)->with('status','Se a actualizado correctamente');
    }

   
    public function destroy($id)
    {
        Cache::flush();//PARA NO ELIMININAR TODA LA INFO DE LA CACHE SE USA TAGS se guardara con REDIS
    }

    
}
