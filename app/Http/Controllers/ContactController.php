<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required',
        ]);

        // Lưu thông tin liên hệ vào cơ sở dữ liệu
        Contact::create($validated);

        // Gửi email (tuỳ chọn)
        Mail::raw($validated['message'], function ($message) use ($validated) {
            $message->from($validated['email'], $validated['name']);
            $message->to('your-email@example.com'); // Địa chỉ email nhận
            $message->subject('Liên hệ từ trang web');
        });

        return redirect()->route('contact.show')->with('success', 'Tin nhắn của bạn đã được gửi!');
    }
}