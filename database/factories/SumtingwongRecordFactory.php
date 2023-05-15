<?php

namespace Athphane\Sumtingwong\Database\Factories;

use Athphane\Sumtingwong\Models\SumtingwongRecord;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Lottery;


class SumtingwongRecordFactory extends Factory
{
    protected $model = SumtingwongRecord::class;

    public function definition(): array
    {
        return [
            'ip'           => $this->faker->ipv4(),
            'route'        => $this->faker->url(),
            'description'  => $this->faker->sentence(),
            'severity'     => $this->faker->randomElement(['low', 'medium', 'high']),
            'addressed_at' => Lottery::odds(1, 10,)
                ->winner(function () {
                    return $this->faker->dateTimeBetween('-10 minutes', 'now');
                })
                ->loser(function () {
                    return null;
                }),
        ];
    }
}

