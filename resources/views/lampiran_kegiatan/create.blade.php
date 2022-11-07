<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Lampiran Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form1" class="form">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="name">
                            @foreach ($rencana as $r)
                            <option value="{{ $r->id }}">{{ $r->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="hasil" class="form-label">Hasil Kegiatan</label>
                        <textarea class="form-control" placeholder="Hasil Kegiatan" id="floatingTextarea2" style="height: 100px" name="hasil"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Kegiatan</label>
                        <input class="form-control" type="file" name="foto[]" id="foto" multiple>
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