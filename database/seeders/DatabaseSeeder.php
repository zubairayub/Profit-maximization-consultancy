<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndAdminSeeder::class,
        ]);

        // Optional demo client user for development/testing.
        $client = User::firstOrCreate(
            ['email' => 'client@pmcpl.test'],
            [
                'name' => 'PMCPL Client',
                'password' => Hash::make('ChangeMe123!'),
            ]
        );

        if (! $client->hasRole('client')) {
            $client->assignRole('client');
        }

        // Demo client company for development/testing (safe to delete in production).
        $demoClient = Client::firstOrCreate(
            ['slug' => 'demo-enterprise'],
            [
                'name' => 'Demo Enterprise',
                'legal_name' => 'Demo Enterprise Holdings LLC',
                'industry' => 'Manufacturing',
                'revenue_band' => '>$100M Revenue',
                'package_tier' => 'gold',
                'status' => 'active',
                'primary_user_id' => $client->id,
                'notes' => 'Demo record created by seeder.',
            ]
        );

        $demoClient->users()->syncWithoutDetaching([
            $client->id => ['relationship' => 'primary'],
        ]);
    }
}
