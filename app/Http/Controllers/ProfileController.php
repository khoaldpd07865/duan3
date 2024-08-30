<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    
    

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Lấy người dùng hiện tại
        $user = $request->user();

        // Cập nhật thông tin hồ sơ của người dùng
        $user->fill($request->validated());

        // Nếu email đã thay đổi, đặt lại email_verified_at thành null
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Lưu các thay đổi
        $user->save();

        // Chuyển hướng về trang chỉnh sửa hồ sơ với thông báo thành công
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Xác thực mật khẩu trước khi xóa tài khoản
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        // Lấy người dùng hiện tại
        $user = $request->user();

        // Đăng xuất người dùng
        Auth::logout();

        // Xóa tài khoản người dùng
        $user->delete();

        // Xóa session và tạo lại token để bảo mật
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Chuyển hướng về trang chính
        return Redirect::to('/');
    }
}