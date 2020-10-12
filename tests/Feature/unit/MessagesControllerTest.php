<?php

namespace Tests\Feature\unit;

use App\Http\Controllers\RolesCRUD;
use App\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class MessagesControllerTest extends TestCase
{

    public function tearDown(){
        Mockery::close();
    }

    public function testIndex()
    {

        $messagesRepo = Mockery::mock('App\Repositories\Messages');

        $view = Mockery::mock('Ulliminate\View\Factory');
           
        $contoller = new RolesCRUD($messagesRepo,$view);

        $view->shouldReceive('make')
        ->with('messages.index', ['messages'=>'paginated_messages'])
        ->once();

        $contoller->index();


        //$response = $this->get('/');

        //$response->assertStatus(200);
    }

    public function testCreate(){
        $messagesRepo = Mockery::mock('App\Repositories\Messages');

        $view = Mockery::mock('Ulliminate\View\Factory');
           
        $contoller = new RolesCRUD($messagesRepo,$view);
    }
}
