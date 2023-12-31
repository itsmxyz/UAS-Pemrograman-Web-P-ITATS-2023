@extends('templates.schale-data')
@section('tittle')
    <title>Data Kelas</title>
@endsection
@section('header-tittle')
    <h1 class="h3 mb-2 text-gray-800" id="tabel">Data Kelas</h1>
@endsection

@section('header-table')
    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Kelas</h6>
@endsection

@section('btn-tambah')
    <div class="dropdown" data-bs-toggle="modal" data-bs-target="#add-data">
        <button class="btn btn-primary btn-transparent" id="add-button">Tambah Kelas</button>
    </div>
@endsection

@section('modal-tambah')
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambahkan Kelas</h5>
            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
        </div>
        <form method="post" action="{{route('schale.sekretaris-create')}}">
            @csrf
            <div class="center-wrap p-4">
                <div class="section text-left md-2">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="kode-kelas" class="mb-4">Kode Kelas</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="kode" class="form-control" required
                                   id="kode-kelas" autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="nama-kelas" class="mb-4">Nama Kelas</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="nama" class="form-control" required
                                   id="nama-kelas" autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="kode-mapel" class="mb-4">Kode Mata Pelajaran</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="mapel" class="form-control" required
                                   id="kode-mapel" autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="nama-mapel" class="mb-4">Nama Mata Pelajaran</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="nama-mapel" class="form-control" required
                                   id="nama-mapel" autocomplete="off">
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
@endsection

@section('table')
    <div class="album py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($kelas as $data)
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                            <div class="card-body">
                                <p class="card-text">{{$data->nama_kelas}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                                href ="{{route('schale.kelas-view'), ['id_kelas' => $data->id_kelas]}}">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Delete</button>
                                    </div>
                                    <small class="text-muted">{{$data->nama_sensei}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
{{--            <table class="table table-bordered" id="dataTable">--}}
{{--                <thead>--}}
{{--                <tr class="text-center">--}}
{{--                    <th>Kode Kelas</th>--}}
{{--                    <th>Nama kelas</th>--}}
{{--                    <th>Kode Mata Pelajaran</th>--}}
{{--                    <th>Nama Mata pelajaran</th>--}}
{{--                    <th>Aksi</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                @foreach($kelas as $data)--}}
{{--                    <tbody>--}}
{{--                    <tr class="text-center">--}}
{{--                        <td>{{$data->id_kelas}}</td>--}}
{{--                        <td>{{$data->nama_kelas}}</td>--}}
{{--                        <td>{{$data->id_mapel}}</td>--}}
{{--                        <td>{{$data->nama_mapel}}</td>--}}
{{--                        <td style="width: 10%">--}}
{{--                            <div class="d-flex justify-content-center">--}}
{{--                                <div class="dropdown" data-bs-toggle="modal"--}}
{{--                                     data-bs-target="#update-data">--}}
{{--                                    <button class="bi bi-pencil-square btn btn-transparent"--}}
{{--                                            id="edit-button" onclick="edit(this)"--}}
{{--                                            data-bs-toggle="tooltip" data-bs-placement="top"--}}
{{--                                            data-bs-title="Edit Data"--}}
{{--                                            data-id-sekretaris="{{$data->id_kelas}}"></button>--}}
{{--                                </div>--}}
{{--                                <div class="dropdown" data-bs-toggle="modal"--}}
{{--                                     data-bs-target="#del-data">--}}
{{--                                    <button class="bi bi-trash3 btn btn-transparent"--}}
{{--                                            id="del-button" onclick="hapus(this)"--}}
{{--                                            data-bs-toggle="tooltip" data-bs-placement="top"--}}
{{--                                            data-bs-title="Hapus Data"--}}
{{--                                            data-id-sekretaris="{{$data->id_sekretaris}}"></button>--}}
{{--                                </div>--}}
{{--                                <div class="dropdown" data-bs-toggle="modal"--}}
{{--                                     data-bs-target="#reset-data">--}}
{{--                                    <button class="bi bi-arrow-clockwise btn btn-transparent"--}}
{{--                                            id="reset-button" onclick="reset(this)"--}}
{{--                                            data-bs-toggle="tooltip" data-bs-placement="top"--}}
{{--                                            data-bs-title="Reset Password"--}}
{{--                                            data-id-sekretaris="{{$data->id_sekretaris}}"></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                @endforeach--}}
{{--            </table>--}}
{{--    </div>--}}
@endsection

@section('edit-form')
    <div class="modal fade" id="update-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Sekretaris</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <form method="post" action="{{route('schale.sekretaris-update')}}">
                    @csrf
                    <div class="center-wrap p-4">
                        <div class="section text-left md-2">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="nama" class="mb-4">Nama</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="hidden" name="id_sekretaris" id="id_sekretaris">
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
                                           id="username-update" autocomplete="off">
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
@endsection

{{--@section('reset-form')--}}
{{--    <!-- Reset Modal -->--}}
{{--    <div class="modal fade" id="reset-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <form method="post" action="{{route('schale.sekretaris-reset')}}">--}}
{{--                    @csrf--}}
{{--                    <div class="modal-header">--}}
{{--                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin untuk reset password akun ini?</h5>--}}
{{--                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true">x</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <div class="center-wrap p-4">--}}
{{--                            <div class="section text-center md-2">--}}
{{--                                <div class="col-md-15">--}}
{{--                                    <div class="form-group mt-2">--}}
{{--                                        <input type="hidden" name="id_sekretaris" id="id-reset" value="">--}}
{{--                                        <h6>Masukkan Password untuk konfirmasi</h6>--}}
{{--                                        <div class="input-group">--}}
{{--                                            <input type="password" name="password" class="form-control" id="password-reset" autocomplete="off">--}}
{{--                                            <button class="btn btn-outline-secondary" type="button" id="password-toggle-reset" onclick="togglePasswordVisibility1()">--}}
{{--                                                <i id="eye-icons-reset" class="bi bi-eye"></i>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>--}}
{{--                        <button type="submit" class="btn btn-primary" onclick="reset()">Reset</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

@section('delete-form')
    <div class="modal fade" id="del-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{{route('schale.sekretaris-delete')}}">
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
@endsection

@section('js')
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
            // Mendapatkan elemen baris induk tombol yang diklik
            var row = button.closest("tr");

            // Mendapatkan nilai-nilai dari kolom lain dalam baris yang sama
            var idSekretaris = row.cells[0].innerText;
            var nama = row.cells[1].innerText;
            var username = row.cells[2].innerText;
            var password = row.cells[3].innerText;

            // Menampilkan nilai input ke konsol
            console.log("Nama: " + nama);
            console.log("Username: " + username);

            // Mengambil data form update
            document.getElementById("nama-update").value = nama;
            document.getElementById("username-update").value = username;
        }

        function hapus(button) {
            var row = button.closest("tr")
            var idSekretaris = row.cells[0].innerText;
            console.log("idSekretaris: " + idSekretaris);
            document.getElementById("id-delete").value = idSekretaris;
        }

        function reset(button) {
            var row = button.closest("tr");
            var idSekretaris = row.cells[0].innerText;
            document.getElementById('id-reset').value = idSekretaris;
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

        //reset
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

        function togglePasswordVisibility2() {
            var passwordInput = document.getElementById("password-tambah");
            var eyeIcon = document.getElementById("eye-icon2");

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
@endsection

