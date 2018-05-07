<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{

    /**
     * display home test.
     *
     * @return void
     */
    public function testDisplayHome()
    {
        $response = $this->get('/');
        $response->assertSee('Exchange');
        $response->assertSee('AED');
    }

    /**
     * select validation test.
     *
     * @return void
     */
    public function testGetResultHome()
    {
        $response = $this->call('POST', '/', [
            '_token' => csrf_token(),
            'currency' => 'JPY'
        ]);
        $response->assertSee('JPY:');
    }

    /**
     * select validation test.
     *
     * @return void
     */
    public function testInvalidNoSelectHome()
    {
        $response = $this->get('/');
        $this->call('POST', '/', [
            '_token' => csrf_token(),
            'currency' => ''
        ]);
        $response->assertSee('The currency field is required.');
    }
}
