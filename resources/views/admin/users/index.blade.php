@extends('layoutsadmin.admin')

@section('content')
<h1>Danh sách người dùng</h1>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Nhóm</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->diachi }}</td>
            <td>
                <form action="{{ route('admin.users.updateGroup', $user->id) }}" method="POST">
                    @csrf
                    <select name="idgroup" class="form-select">
                        @foreach ($groups as $group)
                        <option value="{{ $group->id }}" {{ $user->idgroup == $group->id ? 'selected' : '' }}>
                            {{ $group->name }}
                        </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary mt-2">Cập nhật</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection