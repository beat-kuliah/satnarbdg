@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">

    </div>
    <div class="col-md-4">
        <h3 class="text-center">Rencana Kegiatan</h3>
    </div>
    <div class="col-md-4 text-center">
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#create">Tambah rencana kegiatan</button>
    </div>
</div>
<div class="container" style="margin-top: 20px">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kegiatan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lampiran as $l)
                <tr>
                    <td>{{ $l->id }}</td>
                    <td>{{ $l->hasil_kegiatan }}</td>
                    <td>
                        <a class="btn btn-primary" href="/lampiran/{{ $l->id }}">Tambah Foto</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- modal form create -->
@include('lampiran_kegiatan.create')
@endsection

@section('script')
<script>
    function createFunction() {
        var formData = new FormData(document.getElementById('form1'));

        axios({
            method: 'post',
            url: '/lampiran',
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(response => {
            console.log(response);
            // window.location.href = '/perkara';
        }).catch(error => {
            window.alert('Form kurang lengkap');
            console.log('fail');
            console.log(error);
        });;
    }

    function addFunction(){
        var formData = new FormData(document.getElementById('form2'));
    }
</script>
@endsection