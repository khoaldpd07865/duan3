<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tins')->insert([
            [
                'tieuDe' => 'Hoàng hôn trên sông Mê Kông',
                'tomTat' => 'Bên ghề đá thị xã SaVẳn, thủ phủ miền Trung và Hạ Lào của đất nước Hoa Chăm Pa, người dân đang lịm dần trên mặt sông Mê Kông.',
                'urlHinh' => 'path/to/image1.jpg',
                'noiDung' => 'Nội dung chi tiết của tin tức này...',
                'idLT' => 1,
                'ngayDang' => Carbon::now(),
                'anHien' => 1,
                'noiBat' => 0,
                'tags' => 'Mê Kông, Hoàng hôn',
                'lang' => 'vi',
                'xem' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tieuDe' => 'Tận cùng nỗi đau',
                'tomTat' => 'Tên em là Thanh Trúc. Câu chuyện về em, về cô bé mồ côi cả cha lẫn mẹ, mang trong mình ước mơ đi học mai, đơn độc giữa đại ngàn trong ngày giông bão.',
                'urlHinh' => 'path/to/image2.jpg',
                'noiDung' => 'Nội dung chi tiết của tin tức này...',
                'idLT' => 2,
                'ngayDang' => Carbon::now(),
                'anHien' => 1,
                'noiBat' => 0,
                'tags' => 'Thanh Trúc, Nỗi đau',
                'lang' => 'vi',
                'xem' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}