@extends('admin.layouts.index')
@section('title', 'Update Data GIS - SIGISKAM')
@section('content')
<div class="container mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Update Data GIS</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('datagis.index') }}">Data GIS</a></li>
                            <li class="breadcrumb-item active">Update Data GIS</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    <form action="{{ route('datagis.update', $data->id) }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="tanggal">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ $data->tanggal }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="waktu">Waktu</label>
            <input type="time" id="waktu" name="waktu" class="form-control" value="{{ $data->waktu }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="kecamatan">Kecamatan</label>
            <input type="text" id="kecamatan" name="kecamatan" class="form-control" value="{{ $data->kecamatan }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="kelurahan">Kelurahan</label>
            <input type="text" id="kelurahan" name="kelurahan" class="form-control" value="{{ $data->kelurahan }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="latitude">Latitude</label>
            <input type="text" id="latitude" name="latitude" class="form-control" value="{{ $data->latitude }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="longitude">Longitude</label>
            <input type="text" id="longitude" name="longitude" class="form-control" value="{{ $data->longitude }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="kepala_keluarga">Kepala Keluarga</label>
            <input type="text" id="kepala_keluarga" name="kepala_keluarga" class="form-control" value="{{ $data->kepala_keluarga }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="jiwa">Jumlah Jiwa</label>
            <input type="number" id="jiwa" name="jiwa" class="form-control" value="{{ $data->jiwa }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="materi">Materi</label>
            <input type="text" id="materi" name="materi" class="form-control" value="{{ $data->materi }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="keterangan">Keterangan</label>
            <textarea id="keterangan" name="keterangan" class="form-control" rows="5" required>{{ strip_tags(str_replace('</li>', "\n", str_replace('<li>', '', $data->keterangan ?? ''))) }}

        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('datagis.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
