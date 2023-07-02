@if($errors->any())
    @foreach($errors->all() as $errorMessage)
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{$errorMessage}}'
            });
        </script>
    @endforeach
@elseif(session()->has('sukses'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Berhasil',
            text: {{session('sukses')}},
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif
