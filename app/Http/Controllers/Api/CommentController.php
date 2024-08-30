<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    // Thêm bình luận
    public function store(Request $request, $newsId)
    {
        // Xác thực dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'content' => 'required|string',
            'author_name' => 'required|string', // Yêu cầu trường author_name
        ]);

        // Nếu dữ liệu không hợp lệ, trả về lỗi
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Tạo bình luận mới
        $comment = Comment::create([
            'news_id' => $newsId,
            'content' => $request->content,
            'author_name' => $request->author_name, // Lưu giá trị author_name
        ]);

        // Trả về bình luận mới được tạo
        return response()->json($comment, 201);
    }

    // Xóa bình luận
    public function destroy($id)
    {
        // Tìm bình luận theo ID
        $comment = Comment::find($id);

        // Nếu bình luận không tồn tại, trả về lỗi
        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        // Xóa bình luận
        $comment->delete();
        return response()->json(['message' => 'Comment deleted']);
    }

    // Lấy thông tin bình luận theo ID
    public function show($id)
    {
        // Tìm bình luận theo ID
        $comment = Comment::find($id);

        // Nếu bình luận không tồn tại, trả về lỗi
        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        // Trả về bình luận
        return response()->json($comment);
    }
}