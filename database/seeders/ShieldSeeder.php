<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $rolesWithPermissions = [
            [
                "name" => "ADMIN",
                "guard_name" => "web",
                "permissions" => [
                    "view_role",
                    "view_any_role",
                    "create_role",
                    "update_role",
                    "delete_role",
                    "delete_any_role",
                ]
            ],
            [
                "name" => "MODERATOR",
                "guard_name" => "web",
                "permissions" => []
            ],
            [
                "name" => "EDITOR",
                "guard_name" => "web",
                "permissions" => []
            ],
            [
                "name" => "USER",
                "guard_name" => "web",
                "permissions" => []
            ],
        ];

        static::makeRolesWithPermissions($rolesWithPermissions);
    }

    protected static function makeRolesWithPermissions(array $rolesWithPermissions): void
    {
        if (! blank($rolesWithPermissions)) {

            foreach ($rolesWithPermissions as $rolePlusPermission) {
                $role = Role::query()->firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name'],
                ]);

                if (! blank($rolePlusPermission['permissions'])) {
                    $permissions = collect($rolePlusPermission['permissions']);
                    $permissionModels = $permissions
                        ->map(fn($permission) => Permission::query()->firstOrCreate([
                            'name' => $permission,
                            'guard_name' => $rolePlusPermission['guard_name'],
                        ]))
                        ->all();

                    $role->syncPermissions($permissionModels);
                }
            }
        }
    }
}
