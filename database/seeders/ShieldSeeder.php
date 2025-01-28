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
                    "view_category",
                    "view_any_category",
                    "create_category",
                    "update_category",
                    "restore_category",
                    "restore_any_category",
                    "replicate_category",
                    "reorder_category",
                    "delete_category",
                    "delete_any_category",
                    "force_delete_category",
                    "force_delete_any_category",
                    "view_tag",
                    "view_any_tag",
                    "create_tag",
                    "update_tag",
                    "restore_tag",
                    "restore_any_tag",
                    "replicate_tag",
                    "reorder_tag",
                    "delete_tag",
                    "delete_any_tag",
                    "force_delete_tag",
                    "force_delete_any_tag"
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
