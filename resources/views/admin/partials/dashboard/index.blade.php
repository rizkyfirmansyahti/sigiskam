@extends('admin.layouts.index')
@section('title', 'Dashboard - SIGISKAM')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Semua Admin</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Semua Admin</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-end justify-content-end mb-4">
            <a href="/admin/all-admin/create " class="btn btn-primary btn-sm waves-effect btn-label waves-light"><i
                    class="fas fa-plus-circle label-icon"></i> Admin</a>
        </div>
        <div class="table-responsive mb-4">
            <table class="table align-middle datatable dt-responsive table-check nowrap"
                style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">E-Mail</th>
                        <th scope="col">No. Handphone</th>
                        <th style="width: 80px; min-width: 80px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
