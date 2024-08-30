<?php

use Illuminate\Support\Facades\DB;

$loaitin_arr = DB::table('categories')->select('id', 'name')

    ->limit(5)->get();
?>
<!-- Top News Slider Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
            @if (isset($latestNewsList) && $latestNewsList->count())
            @foreach ($latestNewsList as $news)
            <div class="d-flex mb-4">
                <img src="{{ asset('storage/' . $news->image) }}"
                    style="width: 100px; height: 100px; object-fit: cover;" alt="{{ $news->title }}">
                <div class="d-flex align-items-center bg-light px-3" style="height: 100px; padding: 10px;">
                    <a class="text-secondary font-weight-semi-bold" href="{{ url('/tin/' . $news->id) }}"
                        style="font-size: 15px;">
                        {{ $news->title }}
                        <p style="font-size: 13px; margin: 0;">
                            {{ \Carbon\Carbon::parse($news->created_at)->format('d-m-Y H:i') }}
                        </p>
                    </a>
                </div>
            </div>
            @endforeach
            @else
            <p>Chưa có tin mới.</p>
            @endif
        </div>
    </div>
</div>

<!-- Top News Slider End -->


<!-- Main News Slider Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                    @foreach($randomNews as $news)

                    <div class="position-relative overflow-hidden" style="height: 435px;">
                        <img class="img-fluid h-100" src="{{ asset('storage/' . $news->image) }}"
                            style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1">
                                <a class="text-white" href=""></a>
                                <span class="px-2 text-white">/</span>
                                <a class="text-white"
                                    href="">{{ \Carbon\Carbon::parse($news->created_at)->format('d-m-Y H:i') }}</a>
                            </div>
                            <a class="h2 m-0 text-white font-weight-bold"
                                href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">

                    <h3 class="m-0"></h3>
                    <a class="text-secondary font-weight-medium text-decoration-none" href="">Xem tất cả</a>
                    @foreach($loaitin_arr as $lt)
                </div>
                <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                    <img class="img-fluid w-100 h-100" src="{{ asset('storage/' . $news->image) }}"
                        style="object-fit: cover;">
                    <a href="{{ url('/category/' . $lt->id) }}"
                        class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                        {{ $lt->name }}
                    </a>
                    @endforeach
                </div>


            </div>
        </div>
    </div>
</div>
<!-- Main News Slider End -->


<!-- Featured News Slider Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Nổi Bật</h3>
            <a class="text-secondary font-weight-medium text-decoration-none" href="">Xem tất cả</a>
        </div>
        @if (isset($viewsNews) && $viewsNews->count())
        <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
            @foreach ($viewsNews as $news)
            <div class="position-relative overflow-hidden" style="height: 300px;">
                <img class="img-fluid w-100 h-100" alt="{{ $news->title }}" src="{{ asset('storage/' . $news->image) }}"
                    style="object-fit: cover;">
                <div class="overlay">
                    <div class="mb-1" style="font-size: 13px;">
                        <a class="text-white" href="">Công Nghệ</a>
                        <span class="px-1 text-white">/</span>
                        <span
                            class="text-white">{{ \Carbon\Carbon::parse($news->created_at)->format('d-m-Y H:i') }}</span>
                    </div>
                    <a class="h4 m-0 text-white" href="{{ url('/news2/' . $news->id) }}">{{ $news->title }}</a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p>Chưa có tin nào theo lượt xem.</p>
        @endif
    </div>
</div>

<!-- Featured News Slider End -->

<!-- Featured News Slider End -->


<!-- Category News Slider Start -->
<!-- Category News Slider Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 py-3">
                <div class="bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">Sức Khỏe</h3>
                </div>
                <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    @foreach($healthNews as $news)
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $news->image) }}"
                            style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 13px;">
                                <a href="#">{{ $news->category_name }}</a>
                                <span class="px-1">/</span>
                                <span>{{ \Carbon\Carbon::parse($news->created_at)->format('d-m-Y H:i') }}</span>
                            </div>
                            <a class="h4 m-0" href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Category News Slider End -->


<!-- Category News Slider Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <!-- Danh mục Công Nghệ -->
            <div class="col-lg-6 py-3">
                <div class="bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">Công Nghệ</h3>
                </div>
                <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    @foreach($techNews as $news)
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $news->image) }}"
                            style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 13px;">
                                <a href="#">{{ $news->category_name }}</a>
                                <span class="px-1">/</span>
                                <span>{{ \Carbon\Carbon::parse($news->created_at)->format('d-m-Y H:i') }}</span>
                            </div>
                            <a class="h4 m-0" href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Danh mục Thời sự -->
            <div class="col-lg-6 py-3">
                <div class="bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">Thời sự</h3>
                </div>
                <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    @foreach($currentNews as $news)
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $news->image) }}"
                            style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 13px;">
                                <a href="#">{{ $news->category_name }}</a>
                                <span class="px-1">/</span>
                                <span>{{ \Carbon\Carbon::parse($news->created_at)->format('Ngày d m, Y') }}</span>
                            </div>
                            <a class="h4 m-0" href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Category News Slider End -->

<!-- Category News Slider End -->


<!-- News With Sidebar Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Popular</h3>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="">View
                                All</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="img/news-500x280-2.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 14px;">
                                    <a href="">Công Nghệ</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4" href="">Điều rất quan trọng là đứng ở hai bên cây nho</a>
                                <p class="m-0">Rebum với nỗi đau thứ hai, và thực sự là bản thân âm vật, nó
                                    chỉ là hai
                                    diam,
                                    Tại
                                    công bằng mà nói, internet thực sự thích chúng nhưng hãy để vậy...</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="img/news-100x100-1.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">Công Nghệ</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h6 m-0" href="">Khách hàng nên biết rằng mình là một nhà phát
                                    triển béo</a>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="img/news-100x100-2.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">Công Nghệ</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h6 m-0" href="">Khách hàng nên biết rằng mình là một nhà phát
                                    triển béo</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="img/news-500x280-3.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 14px;">
                                    <a href="">Công Nghệ</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4" href="">Điều rất quan trọng là đứng ở hai bên cây nho</a>
                                <p class="m-0">Rebum với nỗi đau thứ hai, và thực sự là bản thân âm vật, nó
                                    chỉ là hai
                                    diam,
                                    Tại
                                    công bằng mà nói, internet thực sự thích chúng nhưng hãy để vậy...</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="img/news-100x100-3.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">Công Nghệ</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h6 m-0" href="">Khách hàng nên biết rằng mình là một nhà phát
                                    triển béo</a>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="img/news-100x100-4.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">Công Nghệ</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h6 m-0" href="">Khách hàng nên biết rằng mình là một nhà phát
                                    triển béo</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3 pb-3">
                    <a href=""><img class="img-fluid w-100" src="img/ads-700x70.jpg" alt=""></a>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Latest</h3>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                        </div>
                    </div>
                    @if (isset($oldestNews) && $oldestNews->count())
                    @foreach ($oldestNews as $news)
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $news->image) }}"
                                style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 14px;">
                                    <a href="#">Công Nghệ</a>
                                    <span class="px-1">/</span>
                                    <span>{{ \Carbon\Carbon::parse($news->created_at)->format('d-m-Y H:i') }}</span>
                                </div>
                                <a class="h4" href="{{ url('/news2/' . $news->id) }}">{{ $news->title }}</a>

                            </div>
                        </div>

                    </div>
                    @endforeach
                    @else
                    <p>Không có tin tức cũ nhất.</p>
                    @endif
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