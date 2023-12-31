<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>
    @include('templates.cdn-link')

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- Custom fonts for this template-->
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/style-dashboard.css')}}" rel="stylesheet">

    <style>
        .btn {
            color: white;
        }
    </style>
</head>

<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="sidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand align-items-center justify-content-center" href="dashboard.blade.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="bi bi-emoji-laughing-fill"></i>
            </div>
            @yield('sidebar-halo')
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider mt-5">

        <!-- Nav Item - Dashboard -->
        @yield('sidebar-konten')
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Nav Item - User Information -->
                <nav class="nav-item dropdown">
                    <div class="nav-link dropdown-toggle no-arrow" href="#" id="userDropdown" role="button"
                         data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="img-profile rounded-circle"
                             src="{{asset('assets/img/klub/veritas/veritas_leader.png')}}">
                        <div class="mr-2 d-none d-lg-inline text-gray-600 fw-bold">
                            @if(auth()->guard('sensei')->check())
                                {{auth()->guard('sensei')->user()->nama}}
                            @elseif(auth()->guard('sekretaris')->check())
                                {{auth()->guard('sekretaris')->user()->nama}}
                            @endif
                        </div>
                    </div>
                    <!-- Dropdown - User Information -->
                    <ul class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="bi bi-box-arrow-left"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </nav>


                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>
                @yield('statistik')
            </div>
        </div>
    </div>

    <!-- End of Page Wrapper -->

    <!-- Logout Modal-->
    @include('templates.schale-logout')

</div>

</body>
</html>
