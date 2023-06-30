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
    @include('templates.cdn-link')

    <!-- Custom fonts for this template-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/style-dashboard.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

</head>

<body id="page-top">
@include('templates.eror-template')

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    @include('templates.sidebar-schale')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            @include('templates.navbar-schale')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Content Row -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
                            <div class="ml-auto">
                                <div class="dropdown" data-bs-toggle="modal" data-bs-target="#add-data">
                                    <button class="btn btn-primary btn-transparent" id="add-button">Tambah Kelas</button>
                                </div>
                            </div>
                        </div>
                        {{--Tambah DATA MODAL--}}
                        <div class="modal fade" id="add-data" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data Kelas</h5>
                                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">x</span>
                                        </button>
                                    </div>
                                    <form method="post" action="">
                                        @csrf
                                        <div class="center-wrap p-4">
                                            <div class="section text-left md-2">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="nama" class="mb-4">Kode Kelas</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="kode_kelas" class="form-control"
                                                               required
                                                               id="kode_kelas" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="username" class="mb-4">Nama Kelas</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="nama_kelas" class="form-control"
                                                               required
                                                               id="nama_kelas" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="wali_kelas" class="mb-4">Wali Kelas</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select name="wali_kelas" class="form-select" required>
                                                            <option value="" selected disabled>Pilih Wali Kelas</option>
                                                            @foreach($sensei as $senseii)
                                                                <option
                                                                    value="{{$senseii->id_sensei}}">{{$senseii->nama}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                            data-bs-dismiss="modal">Batal
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--DATA--}}
                        <div class="album py-5 bg-body-tertiary">
                            <div class="container">
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                    @foreach($kelas as $kelass)
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <img
                                                    src="https://cdn.discordapp.com/attachments/1124256362302550057/1124256438450147399/20230522_194233.jpg"
                                                    class="bd-placeholder-img card-img-top" width="100%" height="225"
                                                    alt="Thumbnail">
                                                <div class="card-body">
                                                    <p class="card-text">{{$kelass->nama_kelas}}</p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-sm btn-outline-primary">View</button>

                                                            <div class="dropdown" data-bs-toggle="modal" data-bs-target="#update-data">
                                                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                                            </div>
                                                            <div class="dropdown" data-bs-toggle="modal" data-bs-target="#delete-data">
                                                                <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                        <small class="text-body-secondary ml-2">{{$kelass->wali_kelas}} Sensei</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mt-3">
                                    {{$kelas->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="update-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Kelas</h5>
                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                        </div>
                        <form method="post" action="#">
                            @csrf
                            <div class="center-wrap p-4">
                                <div class="section text-left md-2">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="kode" class="mb-4">Kode Kelas</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="kode-kelas" class="form-control" required
                                                   id="kode-update" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="nama" class="mb-4">Nama Kelas</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="hidden" name="id_kelas" id="id_kelas">
                                            <input type="text" name="nama" class="form-control" required
                                                   id="nama-update" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="wali_kelas" class="mb-4">Wali Kelas</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="wali_kelas" class="form-select" required>
                                                <option value="" selected disabled>Pilih Wali Kelas</option>
                                                @foreach($sensei as $senseii)
                                                    <option
                                                        value="{{$senseii->id_sensei}}">{{$senseii->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal
                                        </button>
                                        <button type="submit" class="btn btn-primary" id="edit-btn"
                                                onclick="edit(button)">Edit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="delete-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="#">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data ini?</h5>
                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="center-wrap p-4">
                                    <div class="section text-center md-2">
                                        <div class="col-md-15">
                                            <div class="form-group mt-2">
                                                <input type="hidden" name="id_sekretaris" id="id-delete" value="">
                                                <h6>Masukkan Password untuk konfirmasi</h6>
                                                <div class="input-group">
                                                    <input type="password" name="password" class="form-control" id="password-delete" autocomplete="off">
                                                    <button class="btn btn-outline-secondary" type="button" id="password-toggle-delete" onclick="togglePasswordVisibility()">
                                                        <i id="eye-icon-delete" class="bi bi-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" onclick="hapus()">Hapus</button>
                            </div>
                        </form>
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
    @include('templates.logout-template')

</div>
</body>
<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password-delete");
        var eyeIcon = document.getElementById("eye-icon-delete");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("bi-eye");
            eyeIcon.classList.add("bi-eye-slash");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("bi-eye-slash");
            eyeIcon.classList.add("bi-eye");
        }
    }
</script>
</html>


