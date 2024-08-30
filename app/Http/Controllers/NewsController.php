<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\News;

class NewsController extends Controller
{
    // Hiển thị chi tiết tin tức
    public function show($id)
    {
        $news = News::with('comments')->find($id);

        if (!$news) {
            abort(404);
        }

        return view('news.show', [
            'news' => $news,
        ]);
    }

    // Lưu bình luận
    public function store(Request $request, $newsId)
    {
        $request->validate([
            'author_name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Comment::create([
            'news_id' => $newsId,
            'author_name' => $request->input('author_name'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('news.show', ['id' => $newsId])->with('success', 'Bình luận đã được gửi thành công!');
    }
    
    // Hiển thị tin tức xu hướng
    public function showTrendingNews()
    {
        // Lấy 10 tin tức xu hướng nhất theo số lượng lượt xem
        $viewsNews = DB::table('news')
            ->orderBy('views', 'desc')
            ->take(10)
            ->get();

        return view('news.trending', [
            'viewsNews' => $viewsNews,
        ]);
    }
}