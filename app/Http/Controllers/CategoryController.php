<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function show($id)
    {
        // Lấy thông tin danh mục
        $category = DB::table('categories')->where('id', $id)->first();

        // Lấy danh sách tin tức thuộc danh mục
        $news = DB::table('news')->where('category_id', $id)->get();

        // Lấy danh sách các danh mục cho menu
        $loaitin_arr = DB::table('categories')->select('id', 'name')->get();

        // Truyền dữ liệu đến view
        return view('category', [
            'category' => $category,
            'news' => $news,
            'loaitin_arr' => $loaitin_arr,
        ]);
    }
}