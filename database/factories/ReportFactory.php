<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ReportFactory extends Factory
{
    protected $model = \App\Models\Report::class;

    public function definition(): array
    {
        return [
            'number' => $this->faker->sentence(),  // Случайный заголовок
            'description' => $this->faker->paragraph(),  // Случайный текст
            'status_id' => \App\Models\Status::inRandomOrder()->first()->id,
        ];
    }
}