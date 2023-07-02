@extends('templates.schale-kelas')
@section('card-header')
    <h6 class="m-0 font-weight-bold text-primary">Kelas {{$kelas['kelas']->nama_kelas}}</h6>
    <div class="ml-auto">
        <div class="dropdown" data-bs-toggle="modal" data-bs-target="#add-data">
            <button class="btn btn-primary btn-transparent" id="add-button">Tambah Kelas</button>
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
                        <input type="text" name="nama_kelas" class="form-control" required
                               id="nama-kelas" autocomplete="off" value="{{$kelas['kelas']->wali_kelas}}">
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

@section('js')
<script>
    function showHideSiswa() {
        var toggleButton = document.getElementById('showHideSiswa');
        var buttonText = toggleButton.textContent;

        if (buttonText === 'Sembunyikan Data Siswa') {
            toggleButton.textContent = 'Tampilkan Data Siswa';
        } else {
            toggleButton.textContent = 'Sembunyikan Data Siswa';
        }
    }
</script>
@endsection
