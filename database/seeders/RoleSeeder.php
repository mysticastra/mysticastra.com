<?php

namespace Database\Seeders;

use App\Enums\Role as EnumsRole;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = EnumsRole::cases();
        foreach ($roles as $role) {
            Role::query()->updateOrCreate(['name' => $role->name, 'guard_name' => 'web']);
        }
    }
}
