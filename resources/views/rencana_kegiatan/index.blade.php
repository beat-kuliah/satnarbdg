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
                <th scope="col">Anggota</th>
                <th scope="col">Jenis</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rencana as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->name }}</td>
                <td>
                    @foreach ($r->anggota as $ra)
                        {{ $ra->anggota->name }}<br>
                    @endforeach
                </td>
                <td>{{ $r->jenis }}</td>
                <td>
                    <a class="btn btn-primary" href="/rencana/{{ $r->id }}">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- modal form create -->
@include('rencana_kegiatan.create')
@endsection

@section('script')
<script>
    function createFunction() {
        var formData = new FormData(document.getElementById('form'));

        axios({
            method: 'post',
            url: '/rencana',
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(response => {
            if (response.data == 'success') {
                window.location.href = '/rencana';
            } else {
                window.alert('Form kurang lengkap');
            }
        }).catch(error => {
            window.alert('Form kurang lengkap');
            console.log('fail');
            console.log(error);
        });;
    }

    $("#anggota").select2({
        dropdownParent: $('#create'),
        placeholder: "Silahkan Pilih Anggota",
        allowClear: true
    });
</script>
@endsection