<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Sensei</title>
    <link rel="icon"
          href="https://cdn.discordapp.com/attachments/1104037318521798746/1104123752586956830/millenium.png">
    @include('templates.cdn-link')

    <!-- Custom fonts for this template-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/style-dashboard.css')}}" rel="stylesheet">

</head>

<body id="page-top">
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
                    @yield('header-tittle')
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            @yield('header-table')
                            <div class="ml-auto">
                                <div class="dropdown" data-bs-toggle="modal" data-bs-target="#add-data">
                                    @yield('btn-tambah')
                                </div>
                            </div>
                        </div>
                        {{--Tambah DATA MODAL--}}
                        <div class="modal fade" id="add-data" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                @yield('modal-tambah')
                            </div>
                        </div>
                        {{--TABLE--}}
                        <div class="card-body">
                            <div class="table-responsive">
                                @yield('table')
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
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Sensei</h5>
                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                        </div>
                        <form method="post" action="{{route('schale.sensei-update')}}" id="update-form">
                            @csrf
                            <div class="cnter-wrap p-4">
                                <div class="section text-left md-2">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="nama" class="mb-4">Nama</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="hidden" name="id_sensei" id="id-update" value="">
                                            <input type="text" name="nama" class="form-control" required
                                                   id="nama-update" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="username" class="mb-4">Username</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="username" class="form-control" required
                                                   id="username-update" autocomplete="off"
                                                   value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="kantor" class="mb-4">Kantor</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="kantor" class="form-select" required id="kantor-update">
                                                <option value="" selected disabled>Pilih Kantor</option>
                                                @foreach($kantor as $data)
                                                    <option value="{{$data}}">{{$data}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="sekretaris" class="mb-4">Sekretaris</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="sekretaris" class="form-select" required
                                                    id="sekretaris-update">
                                                <option value="{{old('sekretaris')}}" selected disabled>Pilih
                                                    Sekretaris
                                                </option>
                                                @foreach($sekretaris as $data)
                                                    <option value="{{$data->id_sekretaris}}">{{$data->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal
                                        </button>
                                        <button type="submit" class="btn btn-primary" onclick="edit(button)">Edit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="del-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="{{route('schale.sensei-delete')}}">
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
                                                <input type="hidden" name="id_sensei" id="id-delete" value="">
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

            <!-- Reset Modal -->
            <div class="modal fade" id="reset-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="{{route('schale.sensei-reset')}}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin untuk reset password akun ini?</h5>
                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="center-wrap p-4">
                                    <div class="section text-center md-2">
                                        <div class="col-md-15">
                                            <div class="form-group mt-2">
                                                <input type="hidden" name="id_sensei" id="id-reset" value="">
                                                <h6>Masukkan Password untuk konfirmasi</h6>
                                                <div class="input-group">
                                                    <input type="password" name="password" class="form-control" id="password-reset" autocomplete="off">
                                                    <button class="btn btn-outline-secondary" type="button" id="password-toggle-reset" onclick="togglePasswordVisibility1()">
                                                        <i id="eye-icons-reset" class="bi bi-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" onclick="reset()">Reset</button>
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
    const editButton = document.querySelectorAll('#edit-button');
    editButton.forEach(function (button) {
        const tooltip = new bootstrap.Tooltip(button);
    });

    const hapusButton = document.querySelectorAll('#del-button');
    hapusButton.forEach(function (button) {
        const tooltip = new bootstrap.Tooltip(button);
    });

    const resetButton = document.querySelectorAll('#reset-button');
    resetButton.forEach(function (button) {
        const tooltip = new bootstrap.Tooltip(button);
    });

    function edit(button) {
        var row = button.closest("tr");

        var idSensei = row.cells[0].innerText;
        var nama = row.cells[1].innerText;
        var username = row.cells[2].innerText;
        var kantor = row.cells[3].innerText;
        var namaSekretaris = row.cells[4].innerText;

        document.getElementById('id-update').value = idSensei;
        document.getElementById('nama-update').value = nama;
        document.getElementById('username-update').value = username;
        document.getElementById('kantor-update').value = kantor;
        document.getElementById('sekretaris-update').value = namaSekretaris;
    }

    function hapus(button) {
        var row = button.closest("tr");
        var idSensei = row.cells[0].innerText;
        document.getElementById('id-delete').value = idSensei;
    }
    function reset(button) {
        var row = button.closest("tr");
        var idSensei = row.cells[0].innerText;
        document.getElementById('id-reset').value = idSensei;
    }

    //Delete
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

    function togglePasswordVisibility1() {
        var passwordInput = document.getElementById("password-reset");
        var eyeIcon = document.getElementById("eye-icons-reset");

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


