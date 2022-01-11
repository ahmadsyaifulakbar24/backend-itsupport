<?php

namespace Database\Factories;

use App\Models\Param;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $eselon1 = Param::where('category', 'eselon1')->first();
        return [
            'name' => $this->faker->name(),
            // 'email' => $this->faker->unique()->safeEmail(),
            'email' => 'ipulbelcram@gmail.com',
            'nip' => rand(0, 9999999999999999),
            'email_verified_at' => now(),
            'phone_number' => $this->faker->unique()->phoneNumber(),
            'eselon1_id' => $eselon1->id, 
            'eselon2_id' => Param::where('parent_id', $eselon1->id)->first()->id,
            'position' => 'Manager',
            'password' => Hash::make('12345678'), // password
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
