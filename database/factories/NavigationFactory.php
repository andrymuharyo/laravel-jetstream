<?php

namespace Database\Factories;

use App\Models\Navigation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;

class NavigationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Navigation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'      => User::first()->id,
            'type'         => 'url',
            'target'       => '_blank',
            'parent_id'    => rand(0,5),
            'title'        => $this->faker->unique()->text(50),
            'intro'        => $this->faker->unique()->text(250),
            'url'          => $this->faker->url(),
            'uri'          => null,
            'page_id'      => null,
            'active'       => rand(0,1),
            'submitted_at' => Carbon::now(),
        ];
    }
}
