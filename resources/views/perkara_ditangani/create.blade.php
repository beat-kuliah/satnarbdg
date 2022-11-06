<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah tahanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form" class="form">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="tkp" class="form-label">TKP</label>
                        <input type="text" class="form-control" id="tkp" name="tkp">
                    </div>
                    <div class="mb-3">
                        <label for="pasal" class="form-label">Pasal</label>
                        <input type="text" class="form-control" id="pasal" name="pasal">
                    </div>
                    <div class="mb-3">
                        <label for="identitas" class="form-label">Identitas</label>
                        <input type="text" class="form-control" id="identitas" name="identitas">
                    </div>
                    <div class="mb-3">
                        <label for="umur" class="form-label">Umur</label>
                        <input type="number" class="form-control" id="umur" name="umur">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="masuk" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="masuk" name="masuk">
                    </div>
                    <div class="mb-3">
                        <label for="penyidik" class="form-label">Penyidik</label>
                        <select class="form-select" aria-label="Default select example" name="penyidik">
                            <option selected>Open this select menu</option>
                            @foreach ($penyidik as $p)
                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input class="form-control" type="file" name="foto" id="foto">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="createFunction()">Tambah</button>
            </div>
        </div>
    </div>
</div>