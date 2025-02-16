@extends('admin.layouts.index')
@section('title', 'Create Data GIS - WEBGISKAM')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Create Data GIS</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('datagis.index') }}">Data GIS</a></li>
                            <li class="breadcrumb-item active">Create Data GIS</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <form action="{{ route('datagis.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="mb-2">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" max="{{ now()->toDateString() }}" required>
                    <div class="invalid-feedback">
                        Silahkan masukkan tanggal!
                    </div>
                </div>

                <div class="mb-2">
                    <label for="waktu" class="form-label">Waktu</label>
                    <input type="time" class="form-control" id="waktu" name="waktu">
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <select class="form-control" id="kecamatan" name="kecamatan" required>
                                <option value="" selected disabled>Pilih Kecamatan</option>
                                @foreach ($data as $kecamatan)
                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->kecamatan }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Silahkan pilih kecamatan!
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="kelurahan" class="form-label">Kelurahan</label>
                            <select class="form-control" id="kelurahan" name="kelurahan" required>
                                <option value="" selected disabled>Pilih Kelurahan</option>
                            </select>
                            <div class="invalid-feedback">
                                Silahkan pilih kelurahan!
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" class="form-control" id="latitude" name="latitude" required>
                            <div class="invalid-feedback">
                                Silahkan masukkan latitude!
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" class="form-control" id="longitude" name="longitude" required>
                            <div class="invalid-feedback">
                                Silahkan masukkan longitude!
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="kepala_keluarga" class="form-label">Kepala Keluarga</label>
                            <input type="text" class="form-control" id="kepala_keluarga" name="kepala_keluarga">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="jiwa" class="form-label">Jiwa</label>
                            <input type="text" class="form-control" id="jiwa" name="jiwa">
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="materi" class="form-label">Materi</label>
                    <input type="text" class="form-control" id="materi" name="materi">
                    <div class="invalid-feedback">
                        Silahkan masukkan materi!
                    </div>
                </div>
                <div class="mb-2">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="4"
                        placeholder="Masukkan keterangan tambahan..." required></textarea>
                    <div class="invalid-feedback">
                        Silahkan masukkan keterangan!
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#kecamatan').change(function () {
                var kecamatanId = $(this).val();
                $('#kelurahan').html('<option value="" selected disabled>Loading...</option>');
    
                if (kecamatanId) {
                    $.ajax({
                        url: '{{ route("datagis.getKelurahan") }}',
                        type: 'GET',
                        data: { kecamatan_id: kecamatanId },
                        success: function (data) {
                            $('#kelurahan').html('<option value="" selected disabled>Pilih Kelurahan</option>');
                            $.each(data, function (key, kelurahan) {
                                $('#kelurahan').append('<option value="' + kelurahan.id + '">' + kelurahan.kelurahan + '</option>');
                            });
                        },
                        error: function () {
                            alert('Gagal mengambil data, coba lagi!');
                            $('#kelurahan').html('<option value="" selected disabled>Pilih Kelurahan</option>');
                        }
                    });
                } else {
                    $('#kelurahan').html('<option value="" selected disabled>Pilih Kelurahan</option>');
                }
            });
        });
    </script>
    
@endsection
