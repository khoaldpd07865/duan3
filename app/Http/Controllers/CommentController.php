<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('news')->get(); // Lấy tất cả bình luận cùng với thông tin tin tức

        return view('admin.comments.index', compact('comments'));
    }
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
    
        return redirect()->back()->with('success', 'Bình luận đã được gửi thành công!');
    }
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
    
        return redirect()->route('admin.comments')->with('success', 'Bình luận đã được xóa thành công!');
    }
    

}