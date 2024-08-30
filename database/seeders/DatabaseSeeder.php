<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        
        // Tạo 10 người dùng bằng factory
        \App\Models\User::factory(10)->create();

        // Chèn người dùng mới nếu chưa tồn tại
        if (!DB::table('users')->where('email', 'vuiqua@gmail.com')->exists()) {
            DB::table('users')->insert([
                'name' => 'Vui từng phút giây',
                'email' => 'vuiqua@gmail.com',
                'password' => Hash::make('hehe'),
                'idgroup' => 1,
                'diachi' => 'TPHCM',
            ]);
        }

        if (!DB::table('users')->where('email', 'buonqua@gmail.com')->exists()) {
            DB::table('users')->insert([
                'name' => 'Buồn từng phút giây',
                'email' => 'buonqua@gmail.com',
                'password' => Hash::make('hehe'),
                'idgroup' => 1,
                'diachi' => 'TPHCM',
            ]);
        }

        if (!DB::table('users')->where('email', 'giahu@gmail.com')->exists()) {
            DB::table('users')->insert([
                'name' => 'Nguyen Thi Gia Hu',
                'email' => 'giahu@gmail.com',
                'password' => Hash::make('hehe'),
                'idgroup' => 0,
                'diachi' => 'TPHCM',
            ]);
        }
    }
}