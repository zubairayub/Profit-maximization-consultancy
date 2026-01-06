<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RolesAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Roles (required by the spec: Admin, Editor, Client)
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $editorRole = Role::firstOrCreate(['name' => 'editor']);
        $clientRole = Role::firstOrCreate(['name' => 'client']);

        // Local bootstrap admin (change password immediately in any real environment)
        $admin = User::firstOrCreate(
            ['email' => 'admin@pmcpl.test'],
            [
                'name' => 'PMCPL Admin',
                'password' => Hash::make('ChangeMe123!'),
            ]
        );

        if (! $admin->hasRole($adminRole)) {
            $admin->assignRole($adminRole);
        }

        // Keep editor/client roles created even if not assigned yet.
        unset($editorRole, $clientRole);
    }
}

