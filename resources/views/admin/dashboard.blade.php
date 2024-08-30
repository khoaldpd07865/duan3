@extends('layoutsadmin.admin')

@section('content')
<!-- Section: Main chart -->
<!-- resources/views/admin/dashboard.blade.php -->


<body>
    <div class="container mt-5">
        <h1>Quản lý Tin tức</h1>

        <!-- Liên kết thêm tin tức -->
        <a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">Thêm Tin Mới</a>

        <!-- Danh sách tin tức -->
        @foreach ($news as $item)
        <div class="row mb-3">
            <div class="col-md-8">
                <h4>{{ $item->title }}</h4>
                <p>{{ $item->summary }}</p>
                <p>Danh mục: {{ $item->category->name }}</p>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('admin.edit', $item->id) }}" class="btn btn-warning">Cập nhật</a>
                <form action="{{ route('admin.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-info">Xóa</button>
                </form>

            </div>
        </div>
        <hr>
        @endforeach
    </div>
</body>

</html>

<!--Section: Sales Performance KPIs-->
@endsection