<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Rencana Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form" class="form">
                    <div class="mb-3">
                        <label for="surat" class="form-label">Surat Tugas</label>
                        <input type="file" class="form-control" id="surat" name="surat[]" multiple>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="pasal" class="form-label">Jenis</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis" id="jenis1" value="1">
                                <label class="form-check-label" for="jenis1">Khusus</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis" id="jenis2" value="0">
                                <label class="form-check-label" for="jenis2">Biasa</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="penyidik" class="form-label">Anggota</label><br>
                        <select id="anggota" class="form-select" name="anggota[]" multiple="multiple">
                            @foreach ($anggota as $a)
                            <option value="{{ $a->id }}">{{ $a->name }}</option>
                            @endforeach
                        </select>
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