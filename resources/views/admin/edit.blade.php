@extends('layoutsadmin.admin')

@section('content')


<body>
    <div class="container mt-5">
        <h1>Cập nhật Tin</h1>
        <form action="{{ route('admin.update', $news->id) }}" method="POST" enctype="multipart/form-data"
            class="col-7 m-auto">
            @csrf
            @method('PUT')

            <p>Tiêu đề: <input name="title" class="form-control" value="{{ $news->title }}" required></p>

            <p>Tóm tắt: <textarea name="summary" class="form-control" required>{{ $news->summary }}</textarea></p>

            <p>Hình ảnh hiện tại:</p>
            <img src="{{ asset('storage/' . $news->image) }}" alt="Hình ảnh tin tức" class="img-fluid mb-3">

            <p>Chọn hình ảnh mới (nếu có): <input name="image" type="file" class="form-control"></p>

            <p>Nội dung: <textarea name="content" class="form-control" required>{{ $news->content }}</textarea></p>

            <p>Danh mục:
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if($news->category_id == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </p>

            <p><button type="submit" class="btn btn-warning p-2">Cập nhật tin</button></p>
        </form>
    </div>
</body>

</html>

@endsection