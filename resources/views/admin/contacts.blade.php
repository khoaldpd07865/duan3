@extends('layoutsadmin.admin')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Danh sách tin nhắn liên hệ</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Tin nhắn</th>
                <th>Ngày gửi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Không có tin nhắn nào.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection