@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">Edit Rencana Kegiatan</h1>
    <div class="row" style="border: 1px solid black; border-radius: 5px; margin: 5px; padding: 20px">
        <form id="form" class="form">
            <input type="hidden" name="id" value="{{ $rencana->id }}">
            <div class="mb-3">
                <label for="surat" class="form-label">Surat Tugas</label>
                <input type="file" class="form-control" id="surat" name="surat[]">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kegiatan</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $rencana->name }}">
            </div>
            <div class="mb-3">
                <label for="pasal" class="form-label">Jenis</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis" id="jenis1" value="1" {{ $rencana->jenis == 'Khusus' ? 'checked' : '' }}>
                        <label class="form-check-label" for="jenis1">Khusus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis" id="jenis2" value="0" {{ $rencana->jenis == 'Biasa' ? 'checked' : '' }}>
                        <label class="form-check-label" for="jenis2">Biasa</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="penyidik" class="form-label">Anggota</label>
                <select id="anggota" class="form-select" name="anggota[]" multiple="multiple">
                    @foreach ($anggota as $a)
                    <option value="{{ $a->id }}">{{ $a->name }}</option>
                    @endforeach
                </select>
            </div>
        </form>
        <button class="btn btn-primary" onclick="updateFunction()">Save</button>
    </div>
</div>
@endsection

@section('script')
<script>
    const data = JSON.parse('<?php echo $rencana->anggota ?>');
    var sdata = [];

    $(document).ready(function() {
        data.forEach(arrFunc);
        $("#anggota").val(sdata);
        $("#anggota").select2().trigger('change');
    });

    function arrFunc(item, index){
        sdata.push(item.anggota_id);
    }

    function updateFunction() {
        var formData = new FormData(document.getElementById('form'));

        axios({
            method: 'post',
            url: '/rencana/update',
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(response => {
            console.log(response);
            window.location.href = '/rencana';
        }).catch(error => {
            window.alert('Form kurang lengkap');
            console.log('fail');
            console.log(error);
        });
    }

    $("#anggota").select2({
        placeholder: "Silahkan Pilih Anggota",
        allowClear: true
    });
</script>
@endsection