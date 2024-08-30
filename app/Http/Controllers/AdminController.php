<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\Contact; // Thêm dòng này để sử dụng model Contact
use Illuminate\Support\Facades\Storage; // Thêm dòng này

class AdminController extends Controller
{
    public function index()
    {
        $news = News::with('category')->get(); // Lấy danh sách tin tức với thông tin danh mục
        return view('admin.dashboard', compact('news'));
    }

    public function create()
    {
        $categories = Category::all(); // Lấy danh sách danh mục
        return view('admin.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        // Xử lý upload hình ảnh
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('images', $imageName, 'public');
            $validatedData['image'] = $imagePath;
        }
    
        News::create($validatedData);
    
        return redirect()->route('admin.dashboard')->with('success', 'Tin tức đã được thêm!');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        $categories = Category::all(); // Lấy danh sách danh mục
        return view('admin.edit', compact('news', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $news = News::findOrFail($id);

        // Xử lý hình ảnh nếu có hình ảnh mới được tải lên
        if ($request->hasFile('image')) {
            // Xóa hình ảnh cũ nếu cần
            if ($news->image) {
                Storage::delete('public/' . $news->image);
            }

            // Lưu hình ảnh mới
            $imageName = $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('images', $imageName, 'public');
            $validatedData['image'] = $imagePath;
        } else {
            // Giữ lại hình ảnh cũ nếu không có hình ảnh mới
            $validatedData['image'] = $news->image;
        }

        $news->update($validatedData);

        return redirect()->route('admin.dashboard')->with('success', 'Tin tức đã được cập nhật!');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        // Xóa hình ảnh nếu có
        if ($news->image) {
            Storage::delete('public/' . $news->image);
        }

        $news->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Tin tức đã được xóa!');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Thêm phương thức để hiển thị danh sách tin nhắn liên hệ
    public function showContacts()
    {
        $contacts = Contact::all();
        return view('admin.contacts', compact('contacts'));
    }
}