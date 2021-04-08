<?php

namespace Database\Factories;

use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;

class ContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Content::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'          => User::first()->id,
            'image'            => null,
            'caption'          => $this->faker->text(10),
            'title'            => $this->faker->unique()->text(50),
            'slug'             => $this->faker->unique()->slug(),
            'intro'            => $this->faker->unique()->text(100),
            'description'      => $this->faker->unique()->text(500),
            'meta_title'       => $this->faker->unique()->text(50),
            'meta_description' => $this->faker->unique()->text(100),
            'meta_keywords'    => $this->faker->unique()->text(500),
            'active'           => rand(0,1),
            'submitted_at'     => Carbon::now(),
        ];
    }
}
