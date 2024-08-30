<?php

namespace App\Http\Controllers;

use App\Models\Tin;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TinController extends Controller
{
    public function index()
    {
        $data = Tin::all();
        return view('tin.danhsach', ['data' => $data]);
    }

    public function them(Request $request)
    {
        // Validate dữ liệu yêu cầu
        $request->validate([
            'tieuDe' => 'required|string',
            'tomTat' => 'required|string',
            'urlHinh' => 'required|string',
            'noiDung' => 'required|string',
            'idLT' => 'required|integer',
        ]);

        $t = new Tin;
        $t->tieuDe = $request->input('tieuDe');
        $t->tomTat = $request->input('tomTat');
        $t->urlHinh = $request->input('urlHinh');
        $t->ngayDang = Carbon::now(); // Đặt ngayDang là thời gian hiện tại
        $t->noiDung = $request->input('noiDung');
        $t->idLT = $request->input('idLT');
        $t->save();

        return redirect('/tin/ds');
    }

    public function xoa($id)
    {
        $t = Tin::find($id);
        if ($t == null) {
            return redirect('/thongbao');
        }
        
        $t->delete();
        return redirect('/tin/ds');
    }

    public function capnhat($id)
    {
        $t = Tin::find($id);
        if ($t == null) return redirect('/thongbao');
        return view('tin.capnhattin', ['tin' => $t]);
    }

    public function capnhat_(Request $request, $id)
    {
        $t = Tin::find($id);
        if ($t == null) return redirect('/thongbao');

        // Validate dữ liệu yêu cầu
        $request->validate([
            'tieuDe' => 'required|string',
            'tomTat' => 'required|string',
            'urlHinh' => 'required|string',
            'noiDung' => 'required|string',
            'idLT' => 'required|integer',
        ]);

        $t->tieuDe = $request->input('tieuDe');
        $t->tomTat = $request->input('tomTat');
        $t->urlHinh = $request->input('urlHinh');
        $t->noiDung = $request->input('noiDung');
        $t->idLT = $request->input('idLT');
        $t->save();

        return redirect('/tin/ds');
    }
}