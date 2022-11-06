<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Rencana Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form1" class="form">
                    <div class="mb-3">
                        <label for="hasil" class="form-label">Hasil Kegiatan</label>
                        <input type="text" class="form-control" id="hasil" name="hasil">
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