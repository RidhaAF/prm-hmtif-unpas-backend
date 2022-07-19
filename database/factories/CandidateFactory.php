<?php

namespace Database\Factories;

use Carbon\Carbon;
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
        $class_year = Carbon::now()->year - 3;

        // insert vote_results table when candidate is created
        $voteResult = new VoteResult();
        $voteResult->candidate_nrp = $nrp;
        $voteResult->candidate_class_year = $class_year;
        $voteResult->save();

        return [
            'nrp' => $nrp,
            'name' => $name,
            'class_year' => $class_year,
            'vision' => 'Mewujudkan HMTIF-UNPAS sebagai organisasi yang memiliki keunggulan dan solidaritas tinggi.',
            'mission' => 'Mewujudkan HMTIF-UNPAS yang berisi pribadi amanah dan tanggung jawab. Mampu membuat dan melaksanakan program HMTIF-UNPAS yang bermanfaat secara luas. Bisa membangun dan mengkoordinasi seluruh elemen HMTIF-UNPAS.',
        ];
    }
}
