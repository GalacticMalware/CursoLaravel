<?php

namespace App\Listeners;

use App\Event\MessageWasReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAutoresponder implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    /* public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        $EnvioMensaje  = $event->EnvioMensaje;
        if (auth()->check()) {
            $EnvioMensaje->email = auth()->user()->email;
        }

        Cache::flush(); //Refresca el cache

        Mail::send('emails.mensaje-recibido', ['msg' => $EnvioMensaje], function ($m) use ($EnvioMensaje) {
            $m->to($EnvioMensaje->email, $EnvioMensaje->name)->subject('Tu mensaje fue recibido');
        });
    }
}
