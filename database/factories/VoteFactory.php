<?php

namespace Database\Factories;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class VoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $candidateId = Candidate::all()->random()->id;

        return [
            'user_id' => User::all()->unique()->random()->id,
            'candidate_id' => Hash::make($candidateId),
            'candidate_id_secret' => $candidateId,
        ];
    }
}
