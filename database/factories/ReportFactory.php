<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ReportFactory extends Factory
{
    protected $model = \App\Models\Report::class;

    public function definition()
    {
        $faker = \Faker\Factory::create();
        
        return [
            'number' => $faker->numerify('aaa-###'),
            'description' => $faker->paragraph,
            'created_at' => $faker->dateTimeBetween('-1 week', 'now'),
            'status_id' => 1
        ];
    }
}