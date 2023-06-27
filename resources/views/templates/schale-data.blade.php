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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                    @yield('header-tittle')
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            @yield('header-table')
                            <div class="ml-auto">
                                @yield('btn-tambah')
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

            @yield('edit-form')

            @yield('delete-reset-form')
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
@yield('js')
</html>


