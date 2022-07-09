<?php

namespace Database\Factories;

use App\Models\Candidate;
use App\Models\VoteResult;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Candidate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nrp = '1930400' . $this->faker->unique()->numberBetween(10, 99);
        $name = $this->faker->name();

        // insert vote_results table when candidate is created
        $voteResult = new VoteResult();
        $voteResult->candidate_nrp = $nrp;
        $voteResult->candidate_name = $name;
        $voteResult->save();

        return [
            'nrp' => $nrp,
            'name' => $name,
            'vision' => 'Mewujudkan HMTIF-UNPAS sebagai organisasi yang memiliki keunggulan dan solidaritas tinggi.',
            'mission' => 'Mewujudkan HMTIF-UNPAS yang berisi pribadi amanah dan tanggung jawab. Mampu membuat dan melaksanakan program HMTIF-UNPAS yang bermanfaat secara luas. Bisa membangun dan mengkoordinasi seluruh elemen HMTIF-UNPAS.',
        ];
    }
}
