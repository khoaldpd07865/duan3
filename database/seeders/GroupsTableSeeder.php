<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            ['name' => 'Nhóm 1'],
            ['name' => 'Nhóm 2'],
            // Thêm nhiều nhóm nếu cần
        ]);
    }
}