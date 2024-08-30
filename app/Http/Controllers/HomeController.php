<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy danh sách các danh mục
        $loaitin_arr = DB::table('categories')->select('id', 'name')->limit(5)->get();

        // Lấy 5 tin mới nhất
        $latestNewsList = DB::table('news')
            ->select('id', 'title', 'created_at', 'image')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Lấy tin mới nhất
        $latestNews = DB::table('news')
            ->select('id', 'title', 'created_at')
            ->orderBy('created_at', 'desc')
            ->limit(1)
            ->first();

        // Lấy tin theo số lượt xem (views) nhiều nhất
        $viewsNews = DB::table('news')
            ->select('id', 'title', 'created_at', 'views', 'image')
            ->orderBy('views', 'desc')
            ->limit(10)
            ->get();
  
            $healthNews = DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.id', 'news.title', 'news.created_at', 'news.image', 'categories.name as category_name')
            ->where('categories.name', 'Sức Khỏe')
            ->get(); 
            $techNews = DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.id', 'news.title', 'news.created_at', 'news.image', 'categories.name as category_name')
            ->where('categories.name', 'Công Nghệ')
            ->limit(3) // Giới hạn số tin hiển thị
            ->get();

        // Lấy tin tức thuộc danh mục 'Thời sự'
        $currentNews = DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.id', 'news.title', 'news.created_at', 'news.image', 'categories.name as category_name')
            ->where('categories.name', 'Thời sự')
            ->limit(3) // Giới hạn số tin hiển thị
            ->get();

            $randomNews = DB::table('news')
            ->select('id', 'title', 'created_at', 'image')
            ->inRandomOrder()
            ->limit(2)
            ->get();
            $oldestNews = DB::table('news')
            ->select('id', 'title', 'created_at', 'image')
            ->orderBy('created_at', 'asc')
            ->limit(5)
            ->get();
        // Truyền dữ liệu đến view
        return view('home', [
            'loaitin_arr' => $loaitin_arr,
            'latestNewsList' => $latestNewsList,
            'latestNews' => $latestNews,
            'viewsNews' => $viewsNews,
            'healthNews' => $healthNews,
            'techNews' => $techNews,
            'currentNews' => $currentNews,
            'randomNews' => $randomNews,
            'oldestNews' => $oldestNews,
        ]);
    }

    public function show($id)
    {
        // Lấy chi tiết bài báo
        $news = DB::table('news')->where('id', $id)->first();

        if (!$news) {
            abort(404);
        }

        // Truyền dữ liệu đến view chi tiết
        return view('news.show', compact('news'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Kiểm tra từ khóa tìm kiếm
        if (empty($query) || strlen($query) < 2) {
            // Nếu từ khóa tìm kiếm rỗng hoặc quá ngắn, trả về kết quả rỗng
            $searchResults = collect();
        } else {
            // Sử dụng điều kiện tìm kiếm
            $searchResults = DB::table('news')
                ->where('title', 'LIKE', "%{$query}%")
                ->get();
        }

        return view('search_results', [
            'searchResults' => $searchResults,
            'query' => $query,
        ]);
    }
}