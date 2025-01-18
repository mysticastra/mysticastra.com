<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->updateOrCreate(
            [
                'name' => 'Mystic Astra',
                'email' => 'dev@mysticastra.com'
            ],
            [
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => null
            ]
        );

        $user->syncRoles([Role::ADMIN->name]);
    }
}
