<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Event;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventModelTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     * @test
     *
     * @return void
     */
    public function apiReturnsAListOfUserEvents()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->actingAs($user);

        $events = Event::factory()->times(5)->create(['user_id' => $user->id]);

        $reponse = $this->get('/events?start=2020-11-30-01&end=2021-01-01', ['HTTP_X-Requested-With' => 'XMLHttpRequest'])
            ->assertOk()
            ->assertJsonCount(5);
    }
}
