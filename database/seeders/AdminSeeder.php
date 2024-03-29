<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
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
            'email' => 'prmhmtifunpas@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678!@'),
            'roles' => 'Admin',
        ]);
    }
}
