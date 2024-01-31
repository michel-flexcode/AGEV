<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // option de test urgent : 'user_id' => User::factory(), // Crée un utilisateur prof
        // Récupère un utilisateur qui n'est pas déjà étudiant
        $user = User::whereDoesntHave('student')->inRandomOrder()->first();

        return [
            'user_id' => $user->id,
        ];
    }
}
