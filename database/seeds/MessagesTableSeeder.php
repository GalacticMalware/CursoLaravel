<?php

use App\Event\MessageWasReceived;
use App\Message;
use Illuminate\Support\Carbon;
//use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     Message::truncate();
    
     for($i = 0 ; $i<101 ;$i++ ){
        Message::create([
            'name' => "Usuario {$i}",
            'email' => "user{$i}@io.com",
            'subject' => "Hola {$i}", 
            'content' => "Esto es el mensaje del usuario {$i}",
            'created_at' => Carbon::now()->subDays(10)->addDays($i),
    
         ]);
     }
     
    }
}
