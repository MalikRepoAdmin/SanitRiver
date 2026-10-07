<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->unique()->userName(),
            'password' => static::$password ??= Hash::make('password'),
            'nama_lengkap' => fake()->name(),
            'bio' => fake()->sentence(),
            'email' => fake()->unique()->safeEmail(),
            'tgl_lahir' => fake()->date(),
            'pekerjaan' => fake()->jobTitle(),
            'domisili' => fake()->city(),
        ];
    }
}
