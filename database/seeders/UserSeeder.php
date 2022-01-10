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
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'roles' => 'Admin',
        ]);

        User::factory(100)->create()->where('vote_status', true)->each(function ($user) {
            $user->vote()->save(Vote::factory()->make());
        });
    }
}
