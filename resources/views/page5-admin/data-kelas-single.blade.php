@extends('templates.schale-kelas')
@section('tittle')
    <title>Kelas {{$kelas['kelas']->nama_kelas}}</title>
@endsection
@section('card-header')
    <a class="btn btn-primary btn-transparent" href="{{route('schale.kelas')}}"><i class="bi bi-caret-left"></i> Kembali</a>
    <h6 class="ml-auto font-weight-bold text-primary">Kelas {{$kelas['kelas']->nama_kelas}}</h6>
    <div class="ml-auto">
        <div class="dropdown" data-bs-toggle="modal" data-bs-target="#add-data">
            <button class="btn btn-primary btn-transparent" id="add-button">Tambah Siswa</button>
        </div>
    </div>
@endsection

@section('konten')
    <form method="post" action="{{route('schale.kelas-update', ['id_kelas' => $kelas['kelas']->id_kelas])}}">
        @csrf
        <div class="cnter-wrap p-4">
            <div class="section text-left md-2">
                <div class="row">
                    <div class="col-md-2">
                        <label for="kode_kelas" class="mb-4">Kode Kelas</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" readonly class="form-control-plaintext" id="kode_kelas"
                               value="{{$kelas['kelas']->id_kelas}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="nama" class="mb-4">Nama Kelas</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="nama_kelas" class="form-control" required
                               id="nama-kelas" autocomplete="off" value="{{$kelas['kelas']->nama_kelas}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="username" class="mb-4">Wali Kelas</label>
                    </div>
                    <div class="col-md-5">
                        <select name="jekel" class="form-select" required>
                            <option value="{{$kelas['kelas']->id_sensei}}">{{$kelas['kelas']->wali_kelas}}</option>
                            @foreach($sensei as $senseii)
                                @if($kelas['kelas']->wali_kelas!= $senseii->nama)
                                    <option value="{{$senseii->id_sensei}}">{{$senseii->nama}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <a class="btn btn-primary btn-sm mx-auto mt-3 mb-3" data-bs-toggle="collapse" href="#tableSiswa" onclick="showHideSiswa()"
       role="button" aria-expanded="false" aria-controls="tableSiswa" id="showHideSiswa">
        Tampilkan Data Siswa
    </a>

    <div class="collapse mt-3" id="tableSiswa">
        <div class="card card-body">
            @if($kelas['siswa']->isEmpty())
              Belum ada Siswa di Kelas ini
            @else
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>NIS Siswa</th>
                        <th>Nama Siswa</th>
                        <th>Jenis kelamin</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                        <?php $no=1; ?>
                    @foreach($kelas['siswa'] as $data)
                        <tbody>
                        <tr class="text-center">
                            <td>{{$no}}</td> <?php $no++ ?>
                            <td>{{$data->nis_siswa}}</td>
                            <td>{{$data->nama_siswa}}</td>
                            <td>{{$data->jenis_kelamin}}</td>
                            <td style="width: 10%">
                                <div class="d-flex justify-content-center">
                                    <div class="dropdown" data-bs-toggle="modal"
                                         data-bs-target="#del-data">
                                        <button class="bi bi-trash3 btn btn-transparent"
                                                id="del-button" onclick="hapus(this)"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-title="Hapus Data"
                                                data-id-sensei="{{$data->nis_siswa}}"></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection

@section('modal-tambah')
    <div class="modal fade" id="add-data" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                                    <input type="text" name="nama" class="form-control" required
                                           id="nama" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="jenkel" class="mb-4">Jenis kelamin</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="jekel" class="form-select" required>
                                        <option selected disabled>Pilih jenis kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="id_kelas" value="00000">
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

@endsection

@section('modals')
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
    const hapusButton = document.querySelectorAll('#del-button');
    hapusButton.forEach(function (button) {
        const tooltip = new bootstrap.Tooltip(button);
    });

    function showHideSiswa() {
        var toggleButton = document.getElementById('showHideSiswa');
        var buttonText = toggleButton.textContent;

        if (buttonText === 'Sembunyikan Data Siswa') {
            toggleButton.textContent = 'Tampilkan Data Siswa';
        } else {
            toggleButton.textContent = 'Sembunyikan Data Siswa';
        }
    }

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
@endsection
