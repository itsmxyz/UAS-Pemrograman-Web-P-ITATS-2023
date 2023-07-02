@extends('templates.schale-kelas')
@section('card-header')
    <h6 class="m-0 font-weight-bold text-primary">Kelas {{$kelas['kelas']->first()->nama_kelas}}</h6>
    <div class="ml-auto">
        <div class="dropdown" data-bs-toggle="modal" data-bs-target="#add-data">
            <button class="btn btn-primary btn-transparent" id="add-button">Tambah Kelas</button>
        </div>
    </div>
@endsection
@section('konten')
    <a class="btn btn-primary btn-sm mx-auto" data-bs-toggle="collapse" href="#tableSiswa" onclick="showHideSiswa()"
       role="button" aria-expanded="false" aria-controls="tableSiswa" id="showHideSiswa">
        Tampilkan Data Siswa
    </a>

    <div class="collapse" id="tableSiswa">
        <div class="card card-body">
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
                {{$no = 1}}
                @foreach($kelas['siswa'] as $data)
                    <tbody>
                    <tr class="text-center">
                        <td>{{$no}}</td> {{$no++}}
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
