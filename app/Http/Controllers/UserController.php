<?php




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Lấy tất cả người dùng
        $groups = Group::all(); // Lấy tất cả nhóm quyền

        return view('admin.users.index', compact('users', 'groups'));
    }

    public function updateGroup(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'idgroup' => 'required|integer|exists:groups,id', // Đảm bảo idgroup hợp lệ
        ]);

        $user->idgroup = $request->input('idgroup');
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Nhóm người dùng đã được cập nhật!');
    }
}