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
                <th scope="col">Jenis</th>
                <th scope="col">Anggota</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>

<!-- modal form create -->
@include('barang_bukti.create')
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
            console.log(response);
            // window.location.href = '/perkara';
        }).catch(error => {
            window.alert('Form kurang lengkap');
            console.log('fail');
            console.log(error);
        });;
    }
</script>
@endsection