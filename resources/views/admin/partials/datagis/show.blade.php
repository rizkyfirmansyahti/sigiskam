@extends('admin.layouts.index')
@section('title', 'Update Data GIS - SIGISKAM')
@section('content')
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

        <div class="mb-2">
            <form action="{{ route('datagis.update',$data->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="mb-2">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{$data->tanggal}}" required>
                    <div class="invalid-feedback">
                        Silahkan masukkan tanggal!
                    </div>
                </div>

                <div class="mb-2">
                    <label for="waktu" class="form-label">Waktu</label>
                    <input type="time" class="form-control" id="waktu" name="waktu" value="{{ $data->waktu ? \Carbon\Carbon::parse($data->waktu)->format('H:i') : '' }}">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{$data->kecamatan}}" required>
                            <div class="invalid-feedback">
                                Silahkan masukkan kecamatan!
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="kelurahan" class="form-label">Kelurahan</label>
                            <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="{{$data->kelurahan}}" required>
                            <div class="invalid-feedback">
                                Silahkan masukkan kelurahan!
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" class="form-control" id="latitude" name="latitude" value="{{$data->latitude}}" required>
                            <div class="invalid-feedback">
                                Silahkan masukkan latitude!
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" class="form-control" id="longitude" name="longitude" value="{{$data->longitude}}" required>
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
                            <input type="text" class="form-control" id="kepala_keluarga" name="kepala_keluarga" value="{{$data->kepala_keluarga}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="jiwa" class="form-label">Jiwa</label>
                            <input type="text" class="form-control" id="jiwa" name="jiwa" value="{{$data->jiwa}}">
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="materi" class="form-label">Materi</label>
                    <input type="text" class="form-control" id="materi" name="materi" value="{{$data->materi}}">
                    <div class="invalid-feedback">
                        Silahkan masukkan materi!
                    </div>
                </div>

                <div>
                    <label class="form-label">Keterangan Lama</label>
                    <span>{!! $data->keterangan !!}</span>
                </div>
                <div class="mb-2">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea 
                        class="form-control" 
                        id="keterangan" 
                        name="keterangan" 
                        rows="4" 
                        placeholder="Masukkan keterangan tambahan..." 
                        required></textarea>
                    <div class="invalid-feedback">
                        Silahkan masukkan keterangan!
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
