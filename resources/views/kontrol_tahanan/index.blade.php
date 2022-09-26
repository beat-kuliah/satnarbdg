@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        
    </div>
    <div class="col-md-4">
        <h3 class="text-center">Kontrol Tahanan</h3>
    </div>
    <div class="col-md-4 text-center">
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#create">Tambah tahanan</button>
    </div>
</div>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nama Tersangka</th>
                <th scope="col">Umur</th>
                <th scope="col">Pasal</th>
                <th scope="col">Lama Penahanan</th>
                <th scope="col">Penyidik</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tahanan as $tahan)
            <tr>
                <th scope="row">{{ $tahan->name }}</th>
                <td>{{ $tahan->umur }}</td>
                <td>{{ $tahan->pasal }}</td>
                <td>{{ $tahan->diff }} hari</td>
                <td>{{ $tahan->pname }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('kontrol_tahanan.create')
@endsection

@section('script')
<script>
    $(document).ready(function() {
        console.log('test');
    });
    function createFunction() {
        var formData = new FormData(document.getElementById('form'));

        axios({
            method: 'post',
            url: '/kontrol-tahanan',
            data: formData,
        }).then(response => {
            windows.open('/kontrol-tahanan');
        }).catch(error => {
            window.alert('Form kurang lengkap');
        });;
    }
</script>
@endsection