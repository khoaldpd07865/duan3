@extends('layoutsadmin.admin')

@section('content')
<form action="/tin/them" method="post" class="col-7 m-auto">
    <p>Tiêu đề: <input name="tieuDe" class="form-control" required></p>
    <p>Tóm tắt: <textarea name="tomTat" class="form-control" required></textarea></p>
    <p>urlHinh: <input name="urlHinh" class="form-control" required></p>
    <p>Nội dung: <textarea  name="noiDung" class="form-control" required></textarea></p>
    <p>idLT:
        <select name="idLT" class="form-control" required>
            <option value="1">Xã hội</option>
            <option value="2">Thể thao</option>
            <option value="3">Du lịch</option>
        </select>
    </p>
    <p><button type="submit" class="bg-warning p-2">Thêm tin</button></p>
    @csrf
</form>

@endsection