<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <!-- Các liên kết điều hướng hiện có của bạn -->
            </ul>

            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Đăng ký</a>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Chào, {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- Liên kết chỉnh sửa hồ sơ -->
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">Chỉnh sửa Hồ sơ</a>

                        @if(Auth::user()->idgroup == 1)
                        <!-- Liên kết Quản lý Quản trị viên -->
                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Quản lý Quản trị viên</a>
                        @endif

                        <div class="dropdown-divider"></div>
                        <!-- Biểu mẫu đăng xuất -->
                        <form method="POST" action="{{ route('logout') }}" class="px-4 py-2">
                            @csrf
                            <button type="submit" class="dropdown-item">Đăng xuất</button>
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>