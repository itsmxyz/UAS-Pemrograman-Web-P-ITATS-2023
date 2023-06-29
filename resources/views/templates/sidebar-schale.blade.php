<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.blade.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="bi bi-emoji-laughing-fill"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Halo Admin</div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('schale.dashboard')}}">
            <i class="bi bi-house-door"></i>
            <span>Dashboard Admin</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('schale.sensei')}}">
            <i class="bi bi-person"></i>
            <span>Sensei</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('schale.sekretaris')}}">
            <i class="bi bi-person"></i>
            <span>Sekretaris</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="bi bi-person"></i>
            <span>Siswa</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="bi bi-person"></i>
            <span>Kelas</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
</ul>
