<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->postJson('/api/plate', $this->data());
        $response ->assertStatus(200);
        
    }
    private function data()
    {
        return [
            'name' => "plato fit",
            'description' => "sopa de verduras",
            'precio' => 11000
        ];
    }
}
