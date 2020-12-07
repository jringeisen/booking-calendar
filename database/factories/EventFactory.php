<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'start_recur_date' => '2020-12-01',
            'end_recur_date' => '2020-12-31',
            'day_of_week' => $this->faker->numberBetween(1, 5),
            'start_time' => $this->faker->randomElement(['08:00:00', '09:00:00', '10:00:00']),
            'end_time' => $this->faker->randomElement(['11:00:00', '12:00:00', '13:00:00']),
            'bg_color' => $this->faker->randomElement(['#7C3AED', '#4F46E5', '#2563EB']),
        ];
    }
}
