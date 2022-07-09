<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Candidate;
use App\Models\VoteResult;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

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

        // if vote factory executed, then update vote_results table
        $voteResult = VoteResult::where('candidate_nrp', Candidate::find($candidateId)->nrp)->first();
        $voteResult->total_votes += 1;
        $voteResult->save();

        return [
            'user_id' => User::all()->unique()->random()->id,
            'candidate_id' => Hash::make($candidateId),
        ];
    }
}
