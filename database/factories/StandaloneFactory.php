<?php

namespace Database\Factories;

use App\Models\Standalone;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;

class StandaloneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Standalone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'      => User::first()->id,
            'image'        => null,
            'caption'      => $this->faker->text(10),
            'title'        => $this->faker->unique()->text(50),
            'description'  => $this->faker->unique()->text(500),
        ];
    }
}
