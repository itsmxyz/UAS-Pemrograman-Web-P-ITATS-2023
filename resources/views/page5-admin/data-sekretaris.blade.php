<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Sekretaris</title>
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
                    <h1 class="h3 mb-2 text-gray-800" id="tabel">Data Sekretaris</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Sekretaris</h6>
                            <div class="ml-auto">
                                <div class="dropdown" data-bs-toggle="modal" data-bs-target="#add-data">
                                    <button class="btn btn-primary btn-transparent">Tambah Data</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="add-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data Sekretaris</h5>
                                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">x</span>
                                        </button>
                                    </div>
                                    <form method="post" action="/register-sekretaris">
                                        @csrf
                                        <div class="center-wrap p-4">
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
                                                        <label for="password_sensei" class="mb-4">Password</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="form-group mt-2">
                                                            <div class="input-group">
                                                                <input type="password" name="password" required class="form-control" id="password" autocomplete="off">
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

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                    <tr class="text-center">
                                        <th>ID Sekretaris</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    @foreach($sekretaris as $data)
                                        <tbody>
                                        <tr class="text-center">
                                            <td>{{$data->id_sekretaris}}</td>
                                            <td>{{$data->nama}}</td>
                                            <td>{{$data->username}}</td>
                                            <td style="width: 10%">
                                                <div class="d-flex justify-content-center">
                                                    <div class="dropdown" data-bs-toggle="modal" data-bs-target="#update-data">
                                                        <button type="submit" class="bi bi-pencil-square btn btn-transparent" id="edit-button"></button>
                                                    </div>
                                                    <div class="dropdown" data-bs-toggle="modal" data-bs-target="#del-data">
                                                        <button type="submit" class="bi bi-trash3 btn btn-transparent" id="del-button"></button>
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
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Sekretaris</h5>
                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                        </div>
                        <form method="post" action="/update-sekretaris">
                            @csrf
                            <div class="center-wrap p-4">
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
                                            <label for="password_sensei" class="mb-4">Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group mt-2">
                                                <div class="input-group">
                                                    <input type="password" name="password" required class="form-control" id="passwordupdate" autocomplete="off">
                                                    <button class="btn btn-outline-secondary" type="button" id="password-toggle-sensei" onclick="togglePasswordVisibility2()">
                                                        <i id="eye-icon2" class="bi bi-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary" id="edit-btn" onclick="edit()">Edit</button>
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
                            <form method="post" action="/delete-sekretaris">
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
                            <button type="submit" class="btn btn-primary bx-color-red" onclick="hapus()">Hapus</button>
                        </div>
                    </div>
                    </form>

                </div>
            </div>

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
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Logout Modal-->
    @include('templates.logout-schale')
</div>
</body>
<script>

    function edit() {
        // Mendapatkan nilai input dari elemen-elemen form
        var nama = document.getElementById("nama").value;
        var username = document.getElementById("username").value;
        var password = document.getElementById("passwordupdate").value;

        // Menampilkan nilai input ke konsol
        console.log("Nama: " + nama);
        console.log("Username: " + username);
        console.log("Password: " + password);

        // Melakukan pengiriman data ke server atau manipulasi data lainnya
        // ...

        // Mengosongkan nilai input setelah proses pengiriman atau manipulasi selesai
        document.getElementById("nama").value = "";
        document.getElementById("username").value = "";
        document.getElementById("passwordupdate").value = "";
    }

    function hapus(){
        var hapus = document.getElementById()
    }

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

