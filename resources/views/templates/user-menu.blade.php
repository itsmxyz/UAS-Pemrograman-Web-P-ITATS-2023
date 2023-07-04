
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Kelas</title>
    <link rel="icon"
          href="https://cdn.discordapp.com/attachments/1104037318521798746/1104123752586956830/millenium.png">
    <!--Bootstrap 5.2.3-->
    @include('templates.cdn-link')

    <!-- Custom fonts for this template-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/style-dashboard.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('custom-css')
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="user-dashboard.blade.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="bi bi-emoji-laughing-fill"></i>
            </div>
            <div class="sidebar-brand-text mx-3">
                Haloo <br>
                @if(auth()->guard('sensei')->check())
                    {{auth()->guard('sensei')->user()->nama}}
                @elseif(auth()->guard('sekretaris')->check())
                    {{auth()->guard('sekretaris')->user()->nama}}
                @endif
            </div>
        </a>


        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link"
            @if(auth()->guard('sensei')->check())
                href="{{route('sensei.dashboard')}}"
            @elseif(auth()->guard('sekretaris')->check())
                   href="{{route('sekretaris.dashboard')}}"
            @endif>
                <i class="bi bi-house-door"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed"

               @if(auth()->guard('sensei')->check())
                   href="{{route('sensei.kelas-all')}}"
               @elseif(auth()->guard('sekretaris')->check())
                   href="{{route('sekretaris.dashboard')}}"
                @endif>
                <i class="bi bi-person"></i>
                <span>Kelas</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed"
               @if(auth()->guard('sensei')->check())
                   href="{{route('sensei.mapel-all')}}"
               @elseif(auth()->guard('sekretaris')->check())
                   href="{{route('sekretaris.dashboard')}}"
                @endif>
                <i class="bi bi-person"></i>
                <span>Mata Pelajaran</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            @include('templates.user-navbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Content Row -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex align-items-center justify-content-between">
                            @yield('header-kelas')
                        </div>
                        @yield('konten')
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Millennium School 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
    </div>
    <!-- End of Page Wrapper -->
    <!-- Logout Modal-->
    @include('templates.schale-logout')
</div>
</body>
@yield('js')
</html>


