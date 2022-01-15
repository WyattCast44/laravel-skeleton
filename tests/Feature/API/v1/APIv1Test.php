<?php

namespace Tests\Feature\API\v1;

use Tests\TestCase;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

class APIv1Test extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_health_check_is_valid_and_structure_is_as_expected(): void
    {
        $this->get(route('api.v1.health'))
            ->assertOk()
            ->assertJsonStructure([
                'version',
                'healthy',
                'timestamp',
                'authenticated',
                'extra',
            ]);
    }
}
