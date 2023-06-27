@extends('templates.schale-data')
@section('header-tittle')
    <h1 class="h3 mb-2 text-gray-800" id="tabel">Data Sensei</h1>
@endsection

@section('header-table')
    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Sensei</h6>
@endsection

@section('btn-tambah')
    <div class="dropdown" data-bs-toggle="modal" data-bs-target="#add-data">
        <button class="btn btn-primary btn-transparent" id="add-button">Tambah Data</button>
    </div>
@endsection

@section('modal-tambah')
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data Sensei</h5>
            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
        </div>
        <form method="post" action="{{route('schale.sensei-create')}}">
            @csrf
            <div class="cnter-wrap p-4">
                <div class="section text-left md-2">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="nama" class="mb-4">Nama</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="nama" class="form-control" required
                                   id="nama" autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="username" class="mb-4">Username</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="username" class="form-control" required
                                   id="username" autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="kantor" class="mb-4">Kantor</label>
                        </div>
                        <div class="col-md-9">
                            <select name="kantor" class="form-select" required>
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
                            <select name="sekretaris" class="form-select" required>
                                <option value="" selected disabled>Pilih Sekretaris</option>
                                @foreach($sekretaris as $data)
                                    <option value="{{$data->id_sekretaris}}">{{$data->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="password" class="mb-4">Password</label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group mt-2">
                                <div class="input-group">
                                    <input type="password" name="password"
                                           class="form-control" required id="password-tambah"
                                           autocomplete="off">
                                    <button class="btn btn-outline-secondary" type="button"
                                            id="password-toggle-sensei"
                                            onclick="togglePasswordVisibility2()">
                                        <i id="eye-icon2" class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button"
                                data-bs-dismiss="modal">Batal
                        </button>
                        <button type="submit" class="btn btn-primary" onclick="tambah()">
                            Tambahkan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('table')
    <table class="table table-bordered" id="dataTable">
        <thead>
        <tr class="text-center">
            <th>ID Sensei</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Kantor</th>
            <th>Nama Sekretaris</th>
            <th>Aksi</th>
        </tr>
        </thead>
        @foreach($sensei as $data)
            <tbody>
            <tr class="text-center">
                <td>{{$data->id_sensei}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->username}}</td>
                <td>{{$data->kantor}}</td>
                <td>{{$data->sekretaris->nama}}</td>
                <td style="width: 10%">
                    <div class="d-flex justify-content-center">
                        <div class="dropdown" data-bs-toggle="modal"
                             data-bs-target="#update-data">
                            <button class="bi bi-pencil-square btn btn-transparent"
                                    id="edit-button" onclick="edit(this)"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Edit Data"
                                    data-id-sensei="{{$data->id_sensei}}"></button>
                        </div>
                        <div class="dropdown" data-bs-toggle="modal"
                             data-bs-target="#del-data">
                            <button class="bi bi-trash3 btn btn-transparent"
                                    id="del-button" onclick="hapus(this)"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Hapus Data"
                                    data-id-sensei="{{$data->id_sensei}}"></button>
                        </div>
                        <div class="dropdown" data-bs-toggle="modal"
                             data-bs-target="#reset-data">
                            <button class="bi bi-arrow-clockwise btn btn-transparent"
                                    id="reset-button" onclick="reset(this)"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Reset Password"
                                    data-id-sensei="{{$data->id_sensei}}"></button>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>
@endsection

@section('edit-form')
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
@endsection

@section()
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

        //add
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
