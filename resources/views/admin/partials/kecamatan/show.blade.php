@extends('admin.layouts.index')
@section('title', 'Update Kecamatan Dan Kelurahan - WEBGISKAM')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Update Kecamatan Dan Kelurahan</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('keckel.index') }}">Kecamatan Dan Kelurahan</a></li>
                            <li class="breadcrumb-item active">Update Kecamatan Dan Kelurahan</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <form action="{{ route('keckel.update',$data->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="mb-2">
                    <label for="kecamatan" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                        placeholder="Silahkan masukkan nama anda" value="{{$data->kecamatan}}" required>
                    <div class="invalid-feedback">
                        Silahkan masukkan kecamatan!
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
