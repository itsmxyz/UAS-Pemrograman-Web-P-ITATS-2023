<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Documents</title>
    @include('templates.cdn-link')
    <style>
        #text{
            font-weight: bold;
        }
        #text span{
            color: #0a58ca;
        }
    </style>
</head>
<body cl>
    <div class="d-flex align-items-md-center">
        <img src="https://cdn.discordapp.com/attachments/1104037318521798746/1104123814146748578/millenium1.png" width="200px" height="200px">
        <h1 id="text">Millennium <span>School</span></h1>
    </div>
    <h3>Kelas : {{$print['kelas']->nama_kelas}}</h3>
    <h3>Sensei : {{$print['kelas']->wali_kelas}}</h3>
    <table class="table table-responsive-md table-bordered p-md-4" >
        <thead>
        <tr class="text-center">
            <th>No</th>
            <th>NIS Siswa</th>
            <th>Nama Siswa</th>
            <th>Jenis kelamin</th>
        </tr>
        </thead>
        <?php $no=1; ?>
        @foreach($print['siswa'] as $data)
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
</body>
<script>
    window.print();
</script>
</html>
