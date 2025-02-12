@extends('admin.layouts.index')
@section('title', 'Users - SIGISKAM')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Users</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-end justify-content-end mb-4">
            @if ($totalUsers < 2)
                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm waves-effect btn-label waves-light">
                    <i class="fas fa-plus-circle label-icon"></i> Users
                </a>
            @else
                <button class="btn btn-primary btn-sm waves-effect btn-label waves-light" onclick="showLimitAlert()">
                    <i class="fas fa-plus-circle label-icon"></i> Users
                </button>
            @endif

            <script>
                function showLimitAlert() {
                    Swal.fire({
                        icon: 'error',
                        title: 'User sudah 2',
                        text: 'Tidak dapat menambahkan lebih dari 2 pengguna!',
                    });
                }
            </script>

        </div>
        <div class="table-responsive mb-4">
            <table class="table align-middle  dt-responsive table-check nowrap"
                style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th style="width: 80px; min-width: 80px;">Aksi</th>
                    </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                <tbody>
                    @foreach ($allUsers as $item)
                        <tr>
                            <td>
                                {{ $no++ }}
                            </td>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                {{ $item->username }}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('users.show',$item->id)}}" class="btn btn-sm btn-warning">Update</a>
                                    {{-- @if ($totalUsers > 1)
                                        <a href="{{ route('users.delete', $item->id) }}" class="btn btn-sm btn-danger"
                                            data-confirm-delete="true">
                                            Delete
                                        </a>
                                    @else
                                        <button class="btn btn-sm btn-danger" onclick="showCannotDeleteAlert()">
                                            Delete
                                        </button>
                                    @endif

                                    <script>
                                        function showCannotDeleteAlert() {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Tidak dapat dihapus',
                                                text: 'User tidak dapat dihapus karena hanya ada satu pengguna!',
                                            });
                                        }
                                    </script> --}}

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
