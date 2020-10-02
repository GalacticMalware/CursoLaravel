<?php 

namespace App\Presenters;

use App\Message;

class MessagesPresenters extends Presenter
{
    protected $messages;

    public function __construct(Message $messages)
    {
        $this->message = $messages;
    }

    public function userName()
    {

        if ($this->message->user_id) {
            //return $this->message->user->name;
            return $this->model->user->present()->link();
        }
    }

    public function userEmail()
    {

        if ($this->message->user_id) {
            return $this->message->user->email;
        }
        return $this->message->email;
    }

    public function link(){
       return "<a href='" . route('roles.edit', $this->message->user->id) . "'></a>";
    }
    
}