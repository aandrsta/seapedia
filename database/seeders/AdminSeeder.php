<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Administrator',
                'email' => 'admin@seapedia.com',
                'password' => Hash::make('password'),
            ]
        );

        UserRole::updateOrCreate(
            ['user_id' => $admin->id, 'role' => 'admin']
        );
    }
}
