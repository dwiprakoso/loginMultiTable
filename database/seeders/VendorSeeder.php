<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorSeeder extends Seeder
{
    public function run()
    {
        Vendor::create([
            'name' => 'Vendor 1',
            'email' => 'vendor1@example.com',
            'password' => bcrypt('password123'),
        ]);

        Vendor::create([
            'name' => 'Vendor 2',
            'email' => 'vendor2@example.com',
            'password' => bcrypt('password123'),
        ]);
    }
}
