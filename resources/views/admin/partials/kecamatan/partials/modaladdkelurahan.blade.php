 <!-- Modal Add -->
 <div class="modal fade" id="modalAdd{{ $item->id }}" tabindex="-1" aria-labelledby="modalAddLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddLabel{{ $item->id }}">Tambah Kelurahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('keckel.storeKelurahan') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id_kecamatan" value="{{ $item->id }}">
                    <div class="mb-3">
                        <label for="kelurahan" class="form-label">Nama Kelurahan</label>
                        <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Masukkan nama kelurahan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>