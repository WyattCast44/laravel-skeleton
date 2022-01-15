<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

class ExampleTest extends TestCase
{
    use LazilyRefreshDatabase;
    
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
