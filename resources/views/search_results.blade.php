@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kết quả tìm kiếm cho: "{{ $query }}"</h1>

    @if ($searchResults->isEmpty())
    <p>Không có kết quả nào phù hợp với từ khóa "{{ $query }}"</p>
    @else
    <ul>
        @foreach ($searchResults as $news)
        <li>
            <a href="{{ url('/tin/' . $news->id) }}">{{ $news->title }}</a>
            <p>{{ \Carbon\Carbon::parse($news->created_at)->format('d-m-Y H:i') }}</p>
        </li>
        @endforeach
    </ul>
    @endif
</div>
@endsection