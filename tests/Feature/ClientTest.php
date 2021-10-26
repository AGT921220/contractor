<?php

namespace Tests\Feature;

use App\Client;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class ClientTest extends TestCase
{
    public const DIRECTOR = 1;
     /**
      * @test
      */
    public function canIndexClients()
    {   

        $rootUser = User::find(self::DIRECTOR);
        $this->actingAs($rootUser);


         $response = $this->get('/users');
         $response->getOriginalContent()->users;

         $this->assertIndexClients($response);
    }

    private function assertIndexClients(TestResponse $response):void
    {
        $response->assertStatus(200);        
    }
}
