<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        schema::disableForeignKeyConstraints();
        Category::truncate();
        schema::enableForeignKeyConstraints();

        $data = [
            'comic', 'novel', 'vantasy', 'mystery', 'romance'
        ];

        foreach ($data as $value) {
            Category::insert(['name' => $value]);
        }
    }
}
