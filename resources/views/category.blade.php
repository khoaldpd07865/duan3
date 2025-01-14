@extends('layouts.main')

@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="container">
        <nav class="breadcrumb bg-transparent m-0 p-0">
            <a class="breadcrumb-item" href="#">Home</a>
            <a class="breadcrumb-item" href="#">Category</a>
            <span class="breadcrumb-item active">{{ $category->name }}</span>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- News With Sidebar Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Technology</h3>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                        </div>
                    </div>
                    @forelse($news as $item)
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $item->image) }}"
                                style="object-fit: cover;">

                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 14px;">
                                    <a href="">{{ $category->name }}</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4" href="{{ url('/news/' . $item->id) }}">{{ $item->title }}</a>
                                <p class="m-0">{{ $item->summary }}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>Không có tin tức nào thuộc danh mục này.</p>
                    @endforelse
                </div>

                <div class="mb-3">
                    <a href=""><img class="img-fluid w-100" src="img/ads-700x70.jpg" alt=""></a>
                </div>


            </div>

            <div class="col-lg-4 pt-3 pt-lg-0">
                <!-- Social Follow Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Follow Us</h3>
                    </div>
                    <div class="d-flex mb-3">
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                            style="background: #39569E;">
                            <small class="fab fa-facebook-f mr-2"></small><small>12,345 Fans</small>
                        </a>
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                            style="background: #52AAF4;">
                            <small class="fab fa-twitter mr-2"></small><small>12,345 Followers</small>
                        </a>
                    </div>
                    <div class="d-flex mb-3">
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                            style="background: #0185AE;">
                            <small class="fab fa-linkedin-in mr-2"></small><small>12,345 Connects</small>
                        </a>
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                            style="background: #C8359D;">
                            <small class="fab fa-instagram mr-2"></small><small>12,345 Followers</small>
                        </a>
                    </div>
                    <div class="d-flex mb-3">
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                            style="background: #DC472E;">
                            <small class="fab fa-youtube mr-2"></small><small>12,345 Subscribers</small>
                        </a>
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                            style="background: #1AB7EA;">
                            <small class="fab fa-vimeo-v mr-2"></small><small>12,345 Followers</small>
                        </a>
                    </div>
                </div>
                <!-- Social Follow End -->

                <!-- Newsletter Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Newsletter</h3>
                    </div>
                    <div class="bg-light text-center p-4 mb-3">
                        <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Sign Up</button>
                            </div>
                        </div>
                        <small>Sit eirmod nonumy kasd eirmod</small>
                    </div>
                </div>
                <!-- Newsletter End -->

                <!-- Ads Start -->
                <div class="mb-3 pb-3">
                    <a href=""><img class="img-fluid" src="img/news-500x280-4.jpg" alt=""></a>
                </div>
                <!-- Ads End -->

                <!-- Popular News Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Trending</h3>
                    </div>
                    @if (isset($viewsNews) && $viewsNews->count())
                    @foreach ($viewsNews as $news)
                    <div class="d-flex mb-4">
                        <!-- Increased bottom margin for spacing -->
                        <img src="{{ asset('storage/' . $news->image) }}"
                            style="width: 100px; height: 100px; object-fit: cover;" alt="{{ $news->title }}">
                        <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                            style="height: 100px;">
                            <!-- Increased height -->
                            <div class="mb-1" style="font-size: 13px;">
                                <a href="#">Công Nghệ</a>
                                <span class="px-1">/</span>
                                <span>{{ \Carbon\Carbon::parse($news->created_at)->format('d-m-Y H:i') }}</span>
                            </div>
                            <a class="h6 m-0" href="{{ url('/news2/' . $news->id) }}"
                                style="font-size: 15px;">{{ $news->title }}</a> <!-- Increased font size -->
                            <p style="font-size: 13px;">{{ $news->views }} lượt xem</p>
                            <!-- Increased font size -->
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p>Chưa có tin nào theo lượt xem.</p>
                    @endif
                </div>
                <!-- Popular News End -->

                <!-- Tags Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Tags</h3>
                    </div>
                    <div class="d-flex flex-wrap m-n1">
                        @foreach($loaitin_arr as $lt)
                        <a href="{{ url('/category/' . $lt->id) }}"
                            class="btn btn-sm btn-outline-secondary m-1">{{ $lt->name }}</a>
                        @endforeach

                    </div>
                </div>
                <!-- Tags End -->
            </div>
        </div>
    </div>
</div>
</div>
@endsection