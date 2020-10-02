<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Cache;
use App\Message;


class CacheMessages implements MessagesInterface
{

    protected $messages;

    public function __construct(Messages $messages)
    {
        $this->messages = $messages;
    }

    public function getPagination(){
        
        $key = "messages.page." . request('page', 1);

        return Cache::tags("messages")->rememberForever($key, function () {
            return  $this->messages->getPagination;
        });
       
    }

    public function findById($id){
        return  Cache::remember("messages.{$id}",5,function() use ($id){
            return $this->messages->findById($id);
        });
    }
}