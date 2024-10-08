<?php

namespace Database\Factories;

use App\Models\Calls;
use App\Models\Ratings;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RatingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Ratings::class;

    public function definition()
    {
        $admin = User::where('role', 'admin')->first();

        return [
            'user_id' => $admin,
            'call_id' => Calls::factory(),
            'rating' => rand(1, 5),
        ];
    }
}
