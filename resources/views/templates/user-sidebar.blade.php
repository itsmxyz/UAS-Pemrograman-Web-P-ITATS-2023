@section('sidebar')
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand align-items-center justify-content-center" href="dashboard.blade.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="bi bi-emoji-laughing-fill"></i>
        </div>
        <div class="mx-3">

        </div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider mt-5">

    <!-- Nav Item - Dashboard -->
    @yield('sidebar-konten')
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    </ul>
@endsection
