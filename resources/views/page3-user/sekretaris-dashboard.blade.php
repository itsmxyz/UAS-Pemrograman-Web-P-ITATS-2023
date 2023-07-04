@extends('templates.user-dashboard')

@section('tittle')
    <title>Sekretaris Dashboard</title>
@endsection

@section('sidebar-halo')
    <div class="mx-3"> Haloo <br> {{auth()->guard('sensei')->user()->nama}} </div>
@endsection

@section('sidebar-list')
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
@endsection

{{--DATA--}}
@section('statistik')
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Kelas
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlahKelas}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-calendar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Mata Pelajaran
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold ">{{$jumlahMapel}}</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                             style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-calendar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('sidebar-konten')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('sensei.dashboard')}}">
            <i class="bi bi-house-door"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('sensei.kelas-all')}}">
            <i class="bi bi-person"></i>
            <span>Kelas</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('sensei.mapel-all')}}">
            <i class="bi bi-person"></i>
            <span>Mata pelajaran</span>
        </a>
    </li>
@endsection
