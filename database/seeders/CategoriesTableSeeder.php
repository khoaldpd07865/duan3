<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Công nghệ'],
            ['name' => 'Thời sự'],
            ['name' => 'Giải trí'],
            ['name' => 'Thể thao'],
            ['name' => 'Sức khỏe'],
            ['name' => 'Kinh doanh'],
            ['name' => 'Đời sống'],
            ['name' => 'Giáo dục'],
            ['name' => 'Khoa học'],
            ['name' => 'Du lịch'],
        ];

        DB::table('categories')->insert($categories);
    }
}