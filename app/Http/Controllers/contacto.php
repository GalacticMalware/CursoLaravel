<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Event\MessageWasReceived;
use App\Mail\Mensaje;
use App\Message;


class contacto extends Controller
{
    public function store(Request $request)
    {
        
        //return $request->name;
       // dd(auth()->user()->message());

        $EnvioMensaje = Message::create($request->all());

        
        
        if(auth()->check()){
            auth()->user()->messages()->save($EnvioMensaje);
        }
        /*$EnvioMensaje = Message::create(request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required|min:3'

        ]));*/

        //$EnvioMensaje = Message::all();
       

        /*$mensaje = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required|min:3'

        ]);*/

        // Enviar email

        event(new MessageWasReceived($EnvioMensaje));

        /* 

        //Mail::to('daniel_mg_97@hotmail.com')->queue(new Mensaje($mensaje));
        */
        //return 'datos completos ';
        //return request('name');
        return back()->with('status', 'Recivimos tu mensaje :D');
        //return $request->get('name');
        
    }
}
