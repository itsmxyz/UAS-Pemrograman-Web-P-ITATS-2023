@extends('templates.schale-data')
@section('tittle')
    <title>Data Siswa</title>
@endsection
@section('header-tittle')
    <h1 class="h3 mb-2 text-gray-800" id="tabel">Data Siswa</h1>
@endsection

@section('header-table')
    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Siswa</h6>
@endsection

@section('btn-tambah')
    <div class="dropdown" data-bs-toggle="modal" data-bs-target="#add-data">
        <button class="btn btn-primary btn-transparent" id="add-button">Tambah Data</button>
    </div>
@endsection

@section('modal-tambah')
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data Siswa</h5>
            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
        </div>
        <form method="post" action="{{route('schale.siswa-create')}}">
            @csrf
            <div class="center-wrap p-4">
                <div class="section text-left md-2">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="nama" class="mb-4">Nama</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="nama_siswa" class="form-control" required
                                   id="nama" autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="jenkel" class="mb-4">Jenis kelamin</label>
                        </div>
                        <div class="col-md-9">
                            <select name="jenis_kelamin" class="form-select" required>
                                <option selected disabled>Pilih jenis kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
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
@endsection

@section('table')
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                <tr class="text-center">
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                @foreach($siswa as $data)
                    <tbody>
                    <tr class="text-center">
                        <td>{{$data->nis_siswa}}</td>
                        <td>{{$data->nama_siswa}}</td>
                        <td>{{$data->jenis_kelamin}}</td>
                        <td><a href="{{$data->nama_kelas}}">{{$data->nama_kelas}}</a></td>
                        <td style="width: 10%">
                            <div class="d-flex justify-content-center">
                                <div class="dropdown" data-bs-toggle="modal"
                                     data-bs-target="#update-data">
                                    <button class="bi bi-pencil-square btn btn-transparent"
                                            id="edit-button" onclick="edit(this)"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Edit Data"
                                            data-id-siswa="{{$data->nis_siswa}}"></button>
                                </div>
                                <div class="dropdown" data-bs-toggle="modal"
                                     data-bs-target="#del-data">
                                    <button class="bi bi-trash3 btn btn-transparent"
                                            id="del-button" onclick="hapus(this)"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Hapus Data"
                                            data-id-siswa="{{$data->nis_siswa}}"></button>
                                </div>
                                <div class="dropdown" data-bs-toggle="modal"
                                     data-bs-target="#reset-data">
                                    <button class="bi bi-arrow-clockwise btn btn-transparent"
                                            id="reset-button" onclick="reset(this)"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="Reset Kelas Siswa"
                                            data-id-siswa="{{$data->nis_siswa}}"
                                            data-id-kelas="{{$data->id_kelas}}">
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
            {{$siswa->links()}}
        </div>
    </div>
@endsection

@section('edit-form')
    <div class="modal fade" id="update-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa</h5>
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
                                    <label for="nama" class="mb-4">Nama</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="hidden" name="id_iswa" id="id_siswa">
                                    <input type="text" name="nama" class="form-control" required
                                           id="nama-update" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="jenkel" class="mb-4">Jenis Kelamin</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="jekel" class="form-select" required>
                                        <option selected disabled>Pilih jenis kelamin</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="kelas" class="mb-4">Kelas</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="kelas" class="form-select" required>
                                        <option value="" selected disabled>Pilih Kelas</option>
                                        @foreach($kelas as $data)
                                            <option value="{{$data->nama_kelas}}">{{$data->nama_kelas}}</option>
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
@endsection

@section('reset-form')
    <!-- Reset Modal -->
    <div class="modal fade" id="reset-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="#">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin untuk menghapus siswa ini dari kelas?</h5>
                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="center-wrap p-4">
                            <div class="section text-center md-2">
                                <div class="col-md-15">
                                    <div class="form-group mt-2">
                                        <input type="hidden" name="id_siswa" id="id-reset" value="">
                                        <input type="hidden" name="id_kelas" value="">
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
                        <button type="submit" class="btn btn-primary" onclick="reset()">Hapus dari kelas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('delete-form')
    <div class="modal fade" id="del-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <input type="hidden" name="id_siswa" id="id-delete" value="">
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
            var idSiswa = row.cells[0].innerText;
            var nama = row.cells[1].innerText;
            var jenkel = row.cells[2].innerText;
            var kelas = row.cells[3].innerText;

            // Menampilkan nilai input ke konsol
            console.log("Nama: " + nama);
            console.log("Username: " + jenkel);
            console.log("Kelas: " + kelas);

            // Mengambil data form update
            document.getElementById("nama-update").value = nama;
            document.getElementById("jenkel-update").value = jenkel;
            document.getElementById("kelas-update").value = kelas;
        }

        function hapus(button) {
            var row = button.closest("tr")
            var idSiswa = row.cells[0].innerText;
            console.log("idSiswa: " + idSiswa);
            document.getElementById("id-delete").value = idSiswa;
        }

        function reset(button, id_kelas) {
            var row = button.closest("tr");
            var idSiswa = row.cells[0].innerText;
            document.getElementById('id-kelas').value = id_kelas;
            document.getElementById('id-reset').value = idSiswa;
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
