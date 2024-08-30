@extends('layoutsadmin.admin')

@section('content')

<body>
    <div class="container mt-5">
        <h1>Thêm Tin Mới</h1>
        <form action="{{ route('admin.store') }}" method="post" class="col-7 m-auto" enctype="multipart/form-data">
            @csrf
            <p>Tiêu đề: <input name="title" class="form-control" required></p>
            <p>Tóm tắt: <textarea name="summary" class="form-control" required></textarea></p>
            <p>Hình ảnh: <input name="image" type="file" class="form-control" required></p>
            <p>Nội dung: <textarea name="content" class="form-control" required></textarea></p>
            <p>Danh mục:
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </p>
            <p><button type="submit" class="btn btn-warning p-2">Thêm tin</button></p>
        </form>
    </div>
</body>

</html>
@endsection