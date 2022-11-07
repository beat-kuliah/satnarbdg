@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">Edit Lampiran Kegiatan</h1>
    <div class="row" style="border: 1px solid black; border-radius: 5px; margin: 5px; padding: 20px">
        <form id="form" class="form">
            <input type="hidden" name="id" value="{{ $lampiran->id }}">
            <div class="mb-3">
                <label for="hasil" class="form-label">Hasil Kegiatan</label>
                        <textarea class="form-control" placeholder="Hasil Kegiatan" id="floatingTextarea2" style="height: 100px" name="hasil">{{ $lampiran->hasil_kegiatan }}</textarea>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Kegiatan</label>
                <input class="form-control" type="file" name="foto[]" id="foto" multiple>
            </div>
        </form>
        <button class="btn btn-primary" onclick="updateFunction()">Save</button>
    </div>
    <div class="row" style="border: 1px solid black; border-radius: 5px; margin: 5px; padding: 20px">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($lampiran->foto as $foto)
            <div class="col">
                <div class="card">
                    <img src="{{ $foto->foto != '' ? '/' . $foto->foto : '/images/default.gif' }}" width="100%" height="200px">
                    <div class="card-body">
                        <center><button class="btn btn-danger" onclick="deleteFunction('{{ $foto->id }}')">Delete</button></center>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function updateFunction() {
        var formData = new FormData(document.getElementById('form'));

        axios({
            method: 'post',
            url: '/lampiran/update',
            data: formData,
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(response => {
            window.location.href = '/lampiran/' + response.data;
        }).catch(error => {
            window.alert('Form kurang lengkap');
            console.log('fail');
            console.log(error);
        });;
    }

    function deleteFunction(id) {
        if (confirm('Hapus Foto?') == true) {
            axios({
                method: 'get',
                url: '/lampiran/' + id + '/destroy',
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(response => {
                console.log(response);
                window.location.href = '/lampiran/' + response.data;
            }).catch(error => {
                console.log('fail');
                console.log(error);
            });
        }
    }
</script>
@endsection