<!-- Modal Show -->
<div class="modal fade" id="modalShow{{ $item->id }}" tabindex="-1" aria-labelledby="modalShowLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalShowLabel{{ $item->id }}">Daftar Kelurahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelurahan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item->kelurahan as $kelurahan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>Kelurahan {{ $kelurahan->kelurahan }}</td>
                                <td>
                                    <div class="btn-group">
                                    <!-- Button trigger modal update -->
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdate{{ $kelurahan->id }}">
                                        Update
                                    </button>

                                    <!-- Modal Update -->
                                    <div class="modal fade bg-dark" id="modalUpdate{{ $kelurahan->id }}" tabindex="-1" aria-labelledby="modalUpdateLabel{{ $kelurahan->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalUpdateLabel{{ $kelurahan->id }}">Update Kelurahan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('keckel.updateKelurahan', $kelurahan->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id_kecamatan" value="{{ $item->id }}">
                                                        <div class="mb-3">
                                                            <label for="kelurahan" class="form-label">Nama Kelurahan</label>
                                                            <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="{{ $kelurahan->kelurahan }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-sm btn-danger" onclick="confirmDelete('{{ route('keckel.deleteKelurahan', $kelurahan->id) }}')">
                                        Delete
                                    </button>
                                    
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(url) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data kelurahan ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, Delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>