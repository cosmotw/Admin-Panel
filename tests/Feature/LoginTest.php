<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * Test login error messagebag.
     *
     * @return void
     */
    public function testLoginError()
    {
        $response = $this->post('/login', ['email' => 'guest@guest.com']);
        $response->assertSessionHasErrors(['password']);
    }
}
