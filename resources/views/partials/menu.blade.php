<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <!-- Bao gồm các file CSS và JavaScript cần thiết -->
</head>

<body>
    <?php

use Illuminate\Support\Facades\DB;

$loaitin_arr = DB::table('categories')->select('id', 'name')

    ->limit(5)->get();
?>
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link active">Trang chủ</a>


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Danh mục</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            @foreach($loaitin_arr as $lt)
                            <a href="{{ url('/category/' . $lt->id) }}" class="dropdown-item">{{ $lt->name }}</a>
                            @endforeach
                        </div>
                    </div>



                    <a href="{{ url('/contact') }}" class="nav-item nav-link">Liên hệ</a>
                </div>
                <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
                    <form action="{{ url('/search') }}" method="GET" class="form-inline my-2 my-lg-0">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control mr-sm-2"
                                placeholder="Tìm kiếm tin tức..." required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </nav>
    </div>

    <!-- Nội dung khác của trang -->
</body>

</html>