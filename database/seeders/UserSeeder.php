<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(rand(75, 300))->create()->where('vote_status', true)->each(function ($user) {
            $user->vote()->save(Vote::factory()->make());
        });

        User::create([
            'nrp' => '183040083',
            'name' => 'Ridha Ahmad Firdaus',
            'email' => 'firdaus.183040083@mail.unpas.ac.id',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'roles' => 'User',
            'major' => 'Teknik Informatika',
            'class_year' => 2018,
            'vote_status' => false,
        ]);

        User::create([
            'nrp' => '000000001',
            'name' => 'Tester',
            'email' => 'tester@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'roles' => 'User',
            'major' => 'Teknik Informatika',
            'class_year' => 2020,
            'vote_status' => false,
        ]);

        User::create([
            'nrp' => '000000002',
            'name' => 'Tester 2',
            'email' => 'tester2@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'roles' => 'User',
            'major' => 'Teknik Informatika',
            'class_year' => 2015,
            'vote_status' => false,
        ]);
    }
}
