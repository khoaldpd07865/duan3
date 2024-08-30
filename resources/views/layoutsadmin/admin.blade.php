<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
        integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
        crossorigin="anonymous"></script>
</head>

<body>
    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-light">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <!-- Dashboard Item -->
                    <a href="{{ route('admin.dashboard') }}"
                        class="list-group-item list-group-item-action py-2 d-flex align-items-center">
                        <i class="fas fa-tachometer-alt fa-fw me-3 text-primary"></i>
                        <span class="fs-5">Dashboard</span>
                    </a>

                    <!-- News Management Item -->
                    <a href="{{ route('admin.dashboard') }}"
                        class="list-group-item list-group-item-action py-2 d-flex align-items-center active">
                        <i class="fas fa-newspaper fa-fw me-3 text-success"></i>
                        <span class="fs-5">News Management</span>
                    </a>

                    <!-- Comment Management Item -->
                    <!-- Comment Management Item -->
                    <a href="{{ route('admin.comments') }}"
                        class="list-group-item list-group-item-action py-2 d-flex align-items-center">
                        <i class="fas fa-comments fa-fw me-3 text-danger"></i>
                        <span class="fs-5">Comment Management</span>
                    </a>



                    <!-- User Management Item -->
                    <a href="{{ route('admin.users.index') }}"
                        class="list-group-item list-group-item-action py-2 d-flex align-items-center">
                        <i class="fas fa-users fa-fw me-3 text-warning"></i>
                        <span class="fs-5">User Management</span>
                    </a>

                    <!-- Customer Care Item -->
                    <a href="{{ route('admin.contacts') }}"
                        class="list-group-item list-group-item-action py-2 d-flex align-items-center">
                        <i class="fas fa-headset fa-fw me-3 text-info"></i>
                        <span class="fs-5">Customer Care</span>
                    </a>

                    <!-- Add more sidebar items here -->
                </div>
            </div>
        </nav>

        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="25" alt=""
                        loading="lazy" />
                </a>
                <form class="d-none d-md-flex input-group w-auto my-auto">
                    <input autocomplete="off" type="search" class="form-control rounded"
                        placeholder='Search (ctrl + "/" to focus)' style="min-width: 225px" />
                    <span class="input-group-text border-0"><i class="fas fa-search"></i></span>
                </form>
                <ul class="navbar-nav ms-auto d-flex flex-row">
                    <!-- Notification dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#"
                            id="navbarDropdownMenuLink" role="button" data-mdb-dropdown-init aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <span class="badge rounded-pill badge-notification bg-danger">1</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Some news</a></li>
                            <!-- Add more dropdown items here -->
                        </ul>
                    </li>
                    <!-- Avatar -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
                            id="navbarDropdownMenuLink" role="button" data-mdb-dropdown-init aria-expanded="false">
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle"
                                height="22" alt="" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">My profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>

                            </li>

                    </li>

                </ul>
                </li>
                </ul>
            </div>
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px">
        <div class="container pt-4">
            @yield('content')
        </div>
    </main>
    <!--Main layout-->
    <script type="text/javascript" src="{{ asset('js/mdb.umd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>

</body>


</html>