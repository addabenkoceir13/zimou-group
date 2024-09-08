<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => "Admin Systems",
            'email' => "admin@zimou.team",
            "email_verified_at" =>now(),
            'password' => 123456789,
            'role' => 'admin',
            'remember_token' => Str::random(35),
        ]);

        User::create([
            'username' => "Userzimo#01",
            'email' => "user01@zimou.team",
            "email_verified_at" =>now(),
            'password' => 123456789,
            'role' => 'user',
            'remember_token' => Str::random(35),
        ]);
    }
}
