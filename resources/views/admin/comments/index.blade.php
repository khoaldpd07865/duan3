@extends('layoutsadmin.admin')

@section('content')
<div class="container mt-5">
    <h1>Quản lý Bình luận</h1>

    <!-- Danh sách bình luận -->
    @foreach ($comments as $comment)
    <div class="row mb-3">
        <div class="col-md-8">
            <h4>Bình luận của {{ $comment->author_name }}</h4>
            <p>{{ $comment->content }}</p>
            <p><strong>Tin tức:</strong> {{ $comment->news->title }}</p>
        </div>
        <div class="col-md-4 text-end">
            <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
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