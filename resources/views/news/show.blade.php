@extends('layouts.app')

@section('content')
<div class="container py-3">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4">{{ $news->title }}</h1>

            <p class="lead">{{ $news->content }}</p>
        </div>
    </div>

    <!-- Form bình luận -->
    <div class="mt-4">
        <h2 class="h4">Gửi bình luận</h2>
        <form action="{{ route('comments.store', $news->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="author_name">Tên của bạn</label>
                <input type="text" id="author_name" name="author_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Nội dung bình luận</label>
                <textarea id="content" name="content" rows="4" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Gửi bình luận</button>
        </form>
    </div>

    <!-- Hiển thị các bình luận -->
    <div class="mt-6">
        <h2 class="h4">Các bình luận</h2>
        @foreach ($news->comments as $comment)
        <div class="mt-4 p-3 border rounded">
            <strong>{{ $comment->author_name }}</strong>
            <p class="mt-2">{{ $comment->content }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection