<?php

namespace Database\Factories;

use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Link::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $destinationUrls = [
            'https://www.google.com',
            'https://en.wikipedia.org/wiki/Main_Page'
        ];

        return [
            'name' => ucwords(implode(' ', $this->faker->words(3))),
            'status' => Link::STATUS_ACTIVE,
            'destination_url' => $this->faker->randomElement($destinationUrls),
            'unique_key' => Str::random(5),
            'expires_at' => random_int(0, 1) ? Carbon::now()->addDays(random_int(10,30)) : null,
            'visits' => 0,
        ];
    }
}
