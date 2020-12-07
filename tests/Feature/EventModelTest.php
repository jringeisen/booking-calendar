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
     * index method returns json results.
     * @test
     *
     * @return json
     */
    public function apiReturnsAListOfUserEvents()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $events = Event::factory()->times(5)->create(['user_id' => $user->id]);

        $response = $this->get('/events?start=2020-11-30-01&end=2021-01-01', ['HTTP_X-Requested-With' => 'XMLHttpRequest'])
            ->assertOk()
            ->assertJsonCount(5);
    }

    /**
     * Return 422 if input fields are invalid.
     * @test
     *
     * @return json
     */
    public function returns422StatusIfRequiredFieldsAreEmpty()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $data = [
            'start_recur_date' => '',
            'end_recur_date' => '',
            'start_time' => '',
            'end_time' => '',
            'day_of_week' => ''
        ];

        $response = $this->json('POST', '/events', $data, ['HTTP_X-Requested-With' => 'XMLHttpRequest'])
            ->assertStatus(422)
            ->assertJsonValidationErrors([
                'start_recur_date',
                'end_recur_date',
                'start_time',
                'end_time',
                'day_of_week'
            ]);
    }

    /**
     * Event can be successfully created.
     * @test
     *
     * @return json
     */
    public function anEventCanBeCreatedSuccessfully()
    {        
        $user = User::factory()->create();

        $this->actingAs($user);

        $data = [
            'start_recur_date' => '2020-12-01',
            'end_recur_date' => '2020-12-31',
            'start_time' => '08:00:00',
            'end_time' => '09:00:00',
            'day_of_week' => 2
        ];

        $response = $this->json('POST', '/events', $data, ['HTTP_X-Requested-With' => 'XMLHttpRequest'])
            ->assertOk();
    }

    /**
     * Event can be successfully updated.
     * @test
     *
     * @return json
     */
    public function anEventCanBeSuccessfullyUpdated()
    {        
        $user = User::factory()->create();

        $this->actingAs($user);

        $event = Event::factory()->create();

        $data = [
            'start_recur_date' => $event->start_recur_date,
            'end_recur_date' => $event->end_recur_date,
            'start_time' => '15:00:00',
            'end_time' => '16:00:00',
            'day_of_week' => $event->day_of_week
        ];

        $response = $this->json('PUT', "/events/$event->id", $data, ['HTTP_X-Requested-With' => 'XMLHttpRequest'])
            ->assertOk()
            ->assertJsonFragment([
                'start_time' => '15:00:00',
                'end_time' => '16:00:00'
            ]);
    }

    /**
     * Event can be successfully deleted.
     * @test
     *
     * @return json
     */
    public function anEventCanBeSuccessfullyDeleted()
    {        
        $user = User::factory()->create();

        $this->actingAs($user);

        $event = Event::factory()->create();

        $response = $this->json('DELETE', "/events/$event->id", ['HTTP_X-Requested-With' => 'XMLHttpRequest'])
            ->assertNoContent(204);
    }
}
