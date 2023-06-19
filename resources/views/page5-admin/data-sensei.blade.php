<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Sensei</title>
    <link rel="icon" href="https://cdn.discordapp.com/attachments/1104037318521798746/1104123752586956830/millenium.png">
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
                    <h1 class="h3 mb-2 text-gray-800" id="tabel">Data Sensei</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Sensei</h6>
                            <div class="ml-auto">
                                <div class="dropdown" data-bs-toggle="modal" data-bs-target="#add-data">
                                    <button class="btn btn-primary btn-transparent" id="add-button">Tambah Data</button>
                                </div>
                            </div>
                        </div>
                        {{--Tambah DATA MODAL--}}
                        <div class="modal fade" id="add-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
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
                                                        <input type="text" name="nama" class="form-control" required id="nama" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="username" class="mb-4">Username</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" name="username" class="form-control" required id="username" autocomplete="off">
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
                                                            @foreach($nama as $data)
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
                                                                <input type="password" name="password" class="form-control" required id="password" autocomplete="off">
                                                                <button class="btn btn-outline-secondary" type="button" id="password-toggle-sensei" onclick="togglePasswordVisibility()">
                                                                    <i id="eye-icon" class="bi bi-eye"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--TABLE--}}
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                                <div class="dropdown" data-bs-toggle="modal" data-bs-target="#update-data">
                                                    <button type="submit" class="bi bi-pencil-square btn btn-transparent" id="edit-button"
                                                            data-nama="{{$data->nama}}" data-username="{{$data->username}}"
                                                            data-kantor="{{$data->kantor}}"
                                                            data-sekretaris="{{$data->sekretaris->nama}}"></button>
                                                </div>
                                                <div class="dropdown" data-bs-toggle="modal" data-bs-target="#del-data">
                                                    <button type="submit" class="bi bi-trash3 btn btn-transparent"
                                                            id="del-button" data-id="{{$data->id_sensei}}"></button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="update-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Sensei</h5>
                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                        </div>
                        <form method="post" action="{{route('schale.sensei-update')}}">
                            @csrf
                            <div class="cnter-wrap p-4">
                                <div class="section text-left md-2">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="nama" class="mb-4">Nama</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="nama" class="form-control" required id="nama" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="username" class="mb-4">Username</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="username" class="form-control" required id="username" autocomplete="off">
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
                                                @foreach($nama as $data)
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
                                                    <input type="password" name="password" class="form-control" required id="passwordupdate" autocomplete="off">
                                                    <button class="btn btn-outline-secondary" type="button" id="password-toggle-sensei" onclick="togglePasswordVisibility2()">
                                                        <i id="eye-icon2" class="bi bi-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="del-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data ini?</h5>
                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                @csrf
                                <div class="center-wrap p-4">
                                    <div class="section text-center md-2">
                                        <div class="col-md-15">
                                            <div class="form-group mt-2">
                                                <h6>Masukkan Password untuk konfirmasi</h6>
                                                <div class="input-group">
                                                    <input type="password" name="password" class="form-control" id="passworddelete" autocomplete="off">
                                                    <button class="btn btn-outline-secondary" type="button" id="password-toggle" onclick="togglePasswordVisibility1()">
                                                        <i id="eye-icon1" class="bi bi-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin keluar?</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">Tekan keluar jika anda ingin keluar.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="/belutlogin">Keluar</a>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
<script>
    // Mendapatkan elemen tombol edit
    var editButton = document.getElementById("edit-button");

    // Mendapatkan nilai ID dari atribut data-id
    var idSensei = editButton.getAttribute("data-id");

    // Menggunakan nilai ID yang telah diambil
    console.log(idSensei); // Output: nilai ID dari tombol edit yang diklik

    function togglePasswordVisibility2() {
        var passwordInput = document.getElementById("passwordupdate");
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

    function togglePasswordVisibility1() {
        var passwordInput = document.getElementById("passworddelete");
        var eyeIcon = document.getElementById("eye-icon1");

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

    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var eyeIcon = document.getElementById("eye-icon");

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

