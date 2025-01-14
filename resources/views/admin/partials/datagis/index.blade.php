@extends('admin.layouts.index')
@section('title', 'Data GIS - SIGISKAM')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Data GIS</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Data GIS</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-end justify-content-end mb-4">
            <a href="{{ route('datagis.create') }}" class="btn btn-primary btn-sm waves-effect btn-label waves-light"><i
                    class="fas fa-plus-circle label-icon"></i> Data GIS</a>
        </div>
        <div class="table-responsive mb-4">
            <table class="table align-middle datatable dt-responsive table-check nowrap"
                style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Desa/Kelurahan</th>
                        <th scope="col">Lat,Long</th>
                        <th style="width: 80px; min-width: 80px;">Aksi</th>
                    </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                <tbody>
                    @foreach ($allData as $item)
                        <tr>
                            <td>
                                {{ $no++ }}
                            </td>
                            <td>
                                {{ $item->kecamatan }}
                            </td>
                            <td>
                                {{ $item->kelurahan }}
                            </td>
                            <td>
                                {{ $item->latitude }},{{ $item->longitude }}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalInformasi-{{ $item->id }}">
                                        Details
                                    </button>
                                    {{-- Modal Informasi --}}
                                    <div class="modal fade" id="modalInformasi-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Infomasi Details
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Informasi</th>
                                                            <th>Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Tanggal</td>
                                                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('l, d F Y') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Waktu</td>
                                                            <td>{{ \Carbon\Carbon::parse($item->waktu)->format('H:i') }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kecamatan</td>
                                                            <td>{{ $item->kecamatan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kelurahan</td>
                                                            <td>{{ $item->kelurahan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kepala Keluarga</td>
                                                            <td>{{ $item->kepala_keluarga }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jiwa</td>
                                                            <td>{{ $item->jiwa }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kerugian Materi</td>
                                                            <td>{{ $item->materi }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Keterangan</td>
                                                            <td>{!! $item->keterangan !!}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="" class="btn btn-sm btn-warning">Update</a>
                                    <a href="{{ route('users.delete', $item->id) }}"
                                        class="btn btn-sm btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
