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
        //Create Admin
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'prmhmtifunpas@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678!@'),
            'roles' => 'Admin',
        ]);

        User::factory(rand(75, 120))->create()->where('vote_status', true)->each(function ($user) {
            $user->vote()->save(Vote::factory()->make());
        });

        User::create([
            'nrp' => '183040083',
            'name' => 'Ridha Ahmad Firdaus',
            'username' => 'ridhaaf',
            'email' => 'ridhaaf@gmail.com',
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
            'username' => 'tester',
            'email' => 'tester@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'roles' => 'User',
            'major' => 'Teknik Informatika',
            'class_year' => 2020,
            'vote_status' => false,
        ]);
    }
}
