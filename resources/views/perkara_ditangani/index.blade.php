@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">

    </div>
    <div class="col-md-4">
        <h3 class="text-center">Perkara Ditangani</h3>
    </div>
    <div class="col-md-4 text-center">
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#create">Tambah tahanan</button>
    </div>
</div>
<div class="container" style="margin-top: 20px">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Nama Tersangka</th>
                <th scope="col">Umur</th>
                <th scope="col">Pasal</th>
                <th scope="col">Sisa Penahanan</th>
                <th scope="col">Penyidik</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tahanan as $tahan)
            <tr>
                <th scope="row">{{ $tahan->name }}</th>
                <td>{{ $tahan->umur }}</td>
                <td>{{ $tahan->pasal }}</td>
                <td>{{ $tahan->diff }} hari</td>
                <td>{{ $tahan->penyidik->username }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#foto_{{ $tahan->id }}">
                        <iconify-icon icon="bi:card-image"></iconify-icon>
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detail_{{ $tahan->id }}">
                        Detail
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- modal foto -->
@foreach ($tahanan as $tahan)
<div class="modal fade" id="foto_{{ $tahan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <img src="{{ $tahan->foto != '' ? '/' . $tahan->foto : '/images/default.gif' }}" class="img-fluid">
                    <h2 class="mt-3">{{ $tahan->name }}</h2>
                </center>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- modal detail -->
@foreach ($tahanan as $tahan)
<div class="modal fade" id="detail_{{ $tahan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">NIK</div>
                    <div class="col-md-9">: {{ $tahan->nik }}</div>
                    <div class="col-md-3">Nama</div>
                    <div class="col-md-9">: {{ $tahan->name }}</div>
                    <div class="col-md-3">Umur</div>
                    <div class="col-md-9">: {{ $tahan->umur }}</div>
                    <div class="col-md-3">Alamat</div>
                    <div class="col-md-9">: {{ $tahan->alamat }}</div>
                    <div class="col-md-3">TKP</div>
                    <div class="col-md-9">: {{ $tahan->tkp }}</div>
                    <div class="col-md-3">Pasal</div>
                    <div class="col-md-9">: {{ $tahan->pasal }}</div>
                    <div class="col-md-3">Masuk</div>
                    <div class="col-md-9">: {{ $tahan->masuk }}</div>
                    <div class="col-md-3">Keluar</div>
                    <div class="col-md-9">: {{ $tahan->keluar }}</div>
                    <div class="col-md-3">Penyidik</div>
                    <div class="col-md-9">: {{ $tahan->penyidik->name }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- modal form create -->
@include('perkara_ditangani.create')
@endsection

@section('script')
<script>
    function createFunction() {
        var formData = new FormData(document.getElementById('form'));

        axios({
            method: 'post',
            url: '/perkara',
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(response => {
            window.location.href = '/perkara';
        }).catch(error => {
            window.alert('Form kurang lengkap');
            console.log('fail');
            console.log(error);
        });;
    }
</script>
@endsection