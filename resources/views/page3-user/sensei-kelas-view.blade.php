@extends('templates.user-menu')
@section('header-kelas')
    <a class="btn btn-primary btn-transparent" href="{{route('sensei.kelas-all')}}"><i class="bi bi-caret-left"></i> Kembali</a>
    <div class="d-flex justify-content-center">
        <h6 class="font-weight-bold text-primary text-center">Kelas {{$kelas['kelas']->nama_kelas}}</h6>
        <h6 class="m-0 font-weight-bold text-primary text-center">Data Kelas</h6>
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
                        <input type="text" readonly class="form-control-plaintext" name="nama_kelas" class="form-control" required
                               id="nama-kelas" autocomplete="off" value="{{$kelas['kelas']->nama_kelas}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="username" class="mb-4">Wali Kelas</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" readonly class="form-control-plaintext" name="wali_kelas" class="form-control" required
                               id="wali-kelas" autocomplete="off" value="{{$kelas['kelas']->wali_kelas}}">
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
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection

