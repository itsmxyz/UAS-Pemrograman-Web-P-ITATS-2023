@extends('templates.user-menu')
@section('header-kelas')
    <a class="btn btn-primary btn-transparent" href="{{route('sensei.mapel-all')}}"><i class="bi bi-caret-left"></i> Kembali</a>
    <h6 class="font-weight-bold text-primary text-center">{{$data['mapel']->nama_mapel}} {{$data['mapel']->nama_kelas}}</h6>
    <h6 class="ml-md-5 pl-md-5 font-weight-bold text-primary text-center"></h6>
@endsection

@section('konten')
        <div class="center-wrap p-4">
            <div class="section text-left md-2">
                <div class="row">
                    <div class="col-md-3">
                        <label for="kode_kelas" class="mb-4">Kode Mata Pelajaran</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" readonly class="form-control-plaintext" id="kode_kelas"
                               value="{{$data['mapel']->kode_mapel}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="nama" class="mb-4">Nama Mata Pelajaran</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" readonly class="form-control-plaintext" name="nama_kelas" class="form-control" required
                               id="nama-kelas" autocomplete="off" value="{{$data['mapel']->nama_mapel}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="username" class="mb-4">Tahun Ajaran</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" readonly class="form-control-plaintext" name="wali_kelas" class="form-control" required
                               id="wali-kelas" autocomplete="off" value="{{$data['mapel']->tahun_ajaran}}">
                    </div>
                </div>
            </div>
        </div>

    <a class="btn btn-primary btn-sm mx-auto mt-3 mb-3" data-bs-toggle="collapse" href="#tableSiswa" onclick="showHideSiswa()"
       role="button" aria-expanded="false" aria-controls="tableSiswa" id="showHideSiswa">
        Tampilkan Data Siswa
    </a>

    <div class="collapse mt-3" id="tableSiswa">
        <div class="card card-body">
            @if($data['siswa']->isEmpty())
                Belum ada Siswa di Mata Pelajaran kelas ini
            @else
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>NIS Siswa</th>
                        <th>Nama Siswa</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                        <?php $no=1; ?>
                    @foreach($kelas['siswa'] as $data)
                        <tbody>
                        <tr class="text-center">
                            <td>{{$no}}</td> <?php $no++ ?>
                            <td>{{$data->nis_siswa}}</td>
                            <td>{{$data->nama_siswa}}</td>
                            <td style="width: 10%">

                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection


