<?php

namespace Database\Seeders;

use App\Models\Param;
use App\Models\User;
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
        return [
            User::create([
                'name' => 'Admin',
                'email' => 'bti@kemenkopukm.go.id',
                'email_verified_at' => now(),
                'position' => 'Admin',
                'password' => Hash::make('supportit2022'), // password
                'role' => 'admin',
            ])
        ];
    }
}
