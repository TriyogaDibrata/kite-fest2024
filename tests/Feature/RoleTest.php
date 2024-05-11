<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCanShowRolePage()
    {
        $user = User::role('admin')->get()->random();
        $this->actingAs($user);
        $this->get('/roles')
        ->assertOk();
    }

    public function testCannotShowRolePage()
    {
        $user = User::role('operator')->get()->random();
        $this->actingAs($user);
        $this->get('/roles')
        ->assertStatus(403);
    }

    public function testUnauthorized()
    {
        $this->get('/roles')
        ->assertRedirect('login')
        ->assertStatus(302);
    }
}
