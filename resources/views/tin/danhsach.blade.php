@extends('layoutsadmin.admin')

@section('content')
<div class="container">
    <h1>DANH SÁCH TIN</h1>
    @foreach ($data as $tin)
    <div class="row mb-3">
        <div class="col-md-8">
            <h4>{{ $tin->tieuDe }}</h4>
            <p>{{ $tin->tomTat }}</p>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ url('/tin/capnhat/' . $tin->id) }}" class="btn btn-warning">Cập nhật</a>
            <form action="{{ url('/tin/xoa/' . $tin->id) }}" method="post" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Xóa</button>
            </form>
        </div>
    </div>
    <hr>
    @endforeach
</div>
@endsection