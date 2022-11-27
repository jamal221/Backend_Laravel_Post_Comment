<?php

namespace Tests\Feature\controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class backendcontrollerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexMethod()
    {
        $response = $this->get(route('backend'));

        $response->assertStatus(200);
        $response->assertViewIs('backend_project.layouts.backend_index');
    }
}
