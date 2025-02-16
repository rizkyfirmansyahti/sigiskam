@extends('admin.layouts.index')
@section('title', 'Kecamatan Dan Kelurahan - WEBGISKAM')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Kecamatan Dan Kelurahan</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Kecamatan Dan Kelurahan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-end justify-content-end mb-4">
            <a href="{{ route('keckel.create') }}" class="btn btn-primary btn-sm waves-effect btn-label waves-light"><i
                    class="fas fa-plus-circle label-icon"></i> Add</a>
        </div>
        <div class="table-responsive mb-4">
            <table class="table align-middle datatable dt-responsive table-check nowrap"
                style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kecamatan</th>
                        <th style="width: 80px; min-width: 80px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>Kecamatan {{ $item->kecamatan }}</td>
                            <td>
                                <div class="btn-group">
                                    <!-- Button Show -->
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#modalShow{{ $item->id }}">
                                        Show
                                    </button>
                                    @include('admin.partials.kecamatan.partials.modalshowkelurahan')

                                    <!-- Button Add -->
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd{{ $item->id }}">
                                        Add
                                    </button>
                                    @include('admin.partials.kecamatan.partials.modaladdkelurahan')
                                   
                                    <a href="{{route('keckel.show',$item->id)}}" class="btn btn-sm btn-warning">Update</a>
                                    <a href="{{route('keckel.delete',$item->id)}}" class="btn btn-sm btn-danger"  data-confirm-delete="true">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
