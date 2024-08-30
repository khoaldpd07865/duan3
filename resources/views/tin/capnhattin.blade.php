@extends('layoutsadmin.admin')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<form action="/tin/capnhat/{{ $tin->id }}" method="post" class="col-7 m-auto">
    <p>Tiêu đề: <input name="tieuDe" class="form-control" value="{{ $tin->tieuDe }}" required></p>
    <p>Tóm tắt: <textarea name="tomTat" class="form-control" required>{{ $tin->tomTat }}</textarea></p>
    <p>urlHinh: <input name="urlHinh" class="form-control" value="{{ $tin->urlHinh }}" required></p>
    <p>Nội dung: <textarea name="noiDung" class="form-control" required>{{ $tin->noiDung }}</textarea></p>
    <p>idLT:
        <select name="idLT" class="form-control" required>
            <option value="1" @if($tin->idLT == 1) selected @endif>Xã hội</option>
            <option value="2" @if($tin->idLT == 2) selected @endif>Thể thao</option>
            <option value="3" @if($tin->idLT == 3) selected @endif>Du lịch</option>
        </select>
    </p>
    <p><button type="submit" class="bg-warning p-2">Cập nhật tin</button></p>
    @csrf
</form>
@endsection
