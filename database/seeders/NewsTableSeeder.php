<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tạo các danh mục trước
        $this->call(CategoriesTableSeeder::class);

        // Lấy id của các danh mục
        $technologyCategoryId = DB::table('categories')->where('name', 'Công nghệ')->first()->id;
        $newsCategoryId = DB::table('categories')->where('name', 'Thời sự')->first()->id;
        $entertainmentCategoryId = DB::table('categories')->where('name', 'Giải trí')->first()->id;

        // Danh sách các bài viết
        $newsItems = [
            [
                'title' => 'Hội nghị công nghệ AI 2024',
                'summary' => 'Hội nghị AI 2024 thu hút hàng nghìn chuyên gia...',
                'content' => 'Hội nghị AI 2024 thu hút hàng nghìn chuyên gia trong lĩnh vực trí tuệ nhân tạo từ khắp nơi trên thế giới...',
                'image' => 'images/ai_conference.jpg',
                'views' => 202,
                'category_id' => $technologyCategoryId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Phát triển công nghệ blockchain mới',
                'summary' => 'Công nghệ blockchain đang mở ra nhiều cơ hội...',
                'content' => 'Công nghệ blockchain đang mở ra nhiều cơ hội mới trong các lĩnh vực như tài chính, y tế, và quản lý chuỗi cung ứng...',
                'image' => 'images/blockchain.jpg',
                'views' => 150,
                'category_id' => $technologyCategoryId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ứng dụng IoT trong sản xuất',
                'summary' => 'IoT đang cách mạng hóa ngành sản xuất với các giải pháp thông minh...',
                'content' => 'IoT đang cách mạng hóa ngành sản xuất với các giải pháp thông minh và hiệu quả hơn...',
                'image' => 'images/iot_manufacturing.jpg',
                'views' => 180,
                'category_id' => $technologyCategoryId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tin tức thời sự nóng hổi',
                'summary' => 'Cập nhật những tin tức thời sự mới nhất trong nước và quốc tế...',
                'content' => 'Cập nhật những tin tức thời sự mới nhất trong nước và quốc tế, từ chính trị, kinh tế đến xã hội...',
                'image' => 'images/breaking_news.jpg',
                'views' => 250,
                'category_id' => $newsCategoryId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Phân tích thời sự quốc tế',
                'summary' => 'Những phân tích chuyên sâu về các sự kiện thời sự quốc tế...',
                'content' => 'Những phân tích chuyên sâu về các sự kiện thời sự quốc tế, giúp độc giả có cái nhìn toàn diện và sâu sắc hơn...',
                'image' => 'images/international_news.jpg',
                'views' => 230,
                'category_id' => $newsCategoryId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Chương trình giải trí mới',
                'summary' => 'Giới thiệu chương trình giải trí mới sắp ra mắt...',
                'content' => 'Giới thiệu chương trình giải trí mới sắp ra mắt, hứa hẹn mang lại nhiều tiếng cười và phút giây thư giãn cho khán giả...',
                'image' => 'images/entertainment_show.jpg',
                'views' => 210,
                'category_id' => $entertainmentCategoryId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sự kiện giải trí nổi bật',
                'summary' => 'Điểm lại các sự kiện giải trí nổi bật trong tuần...',
                'content' => 'Điểm lại các sự kiện giải trí nổi bật trong tuần, từ các buổi biểu diễn âm nhạc đến các chương trình truyền hình...',
                'image' => 'images/entertainment_event.jpg',
                'views' => 190,
                'category_id' => $entertainmentCategoryId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cuộc thi tài năng âm nhạc',
                'summary' => 'Cuộc thi tài năng âm nhạc thu hút sự quan tâm của giới trẻ...',
                'content' => 'Cuộc thi tài năng âm nhạc thu hút sự quan tâm của giới trẻ, tạo cơ hội cho các tài năng trẻ thể hiện bản thân...',
                'image' => 'images/music_talent_show.jpg',
                'views' => 170,
                'category_id' => $entertainmentCategoryId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Xu hướng thời trang 2024',
                'summary' => 'Những xu hướng thời trang nổi bật năm 2024...',
                'content' => 'Những xu hướng thời trang nổi bật năm 2024, từ phong cách cổ điển đến hiện đại...',
                'image' => 'images/fashion_trends.jpg',
                'views' => 160,
                'category_id' => $entertainmentCategoryId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Phim bom tấn sắp ra mắt',
                'summary' => 'Giới thiệu những bộ phim bom tấn sắp ra mắt trong năm 2024...',
                'content' => 'Giới thiệu những bộ phim bom tấn sắp ra mắt trong năm 2024, hứa hẹn sẽ mang lại nhiều pha hành động mãn nhãn...',
                'image' => 'images/blockbuster_movies.jpg',
                'views' => 140,
                'category_id' => $entertainmentCategoryId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Chèn từng bài viết vào bảng `news`
        foreach ($newsItems as $news) {
            DB::table('news')->insert($news);
        }
    }
}