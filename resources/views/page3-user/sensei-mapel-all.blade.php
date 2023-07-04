@extends('templates.user-menu')

@section('custom-css')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }
        .bd-mode-toggle {
            z-index: 1500;
        }
    </style>
@endsection

@section('sidebar-konten')
    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('sensei.kelas-all')}}">
            <i class="bi bi-person"></i>
            <span>Kelas</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="bi bi-person"></i>
            <span>Mata Pelajaran</span>
        </a>
    </li>
    <hr class="sidebar-divider">
@endsection

@section('konten')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($mapel as $mapell)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img
                                src="https://cdn.discordapp.com/attachments/1124256362302550057/1124256438450147399/20230522_194233.jpg"
                                class="bd-placeholder-img card-img-top" width="100%" height="225"
                                alt="Thumbnail">
                            <div class="card-body d-grid">
                                <div class="d-flex justify-content-between">
                                    <p class="card-text" id="nama-kelas">{{$mapell->nama_mapel}}</p>
                                    <p class="card-text" id="id-kelas">{{$mapell->kode_mapel}}</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group d-flex" >
                                        <a type="button" class="btn btn-sm btn-outline-primary"
                                           href="{{route('sensei.mapel-view',[
                                            'kode_mapel' => $mapell->kode_mapel,
                                            'id_kelas'   => $mapell->id_kelas
                                            ])}}">View</a>
                                    </div>
                                    <div>
                                        <small>{{$mapell->nama_kelas}} {{$mapell->tahun_ajaran}}</small>
                                        <small>{{$mapell->semester}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mt-3">
                    {{$mapel->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection


