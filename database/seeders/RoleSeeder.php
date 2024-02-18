<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        schema::disableForeignKeyConstraints();
        Role::truncate();
        schema::enableForeignKeyConstraints();

        $data = [
            'admin', 'client'
        ];

        foreach ($data as $value) {
            Role::insert(['name' => $value]);
        }
    }
}
