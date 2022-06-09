<?php

namespace Database\Seeders;

use App\Models\VotingTime;
use Illuminate\Database\Seeder;

class VotingTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VotingTime::create([
            'start_time' => '2022-06-30 09:00:00',
            'end_time' => '2022-06-30 17:00:00',
        ]);
    }
}
