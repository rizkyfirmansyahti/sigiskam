@extends('admin.layouts.index')
@section('title', 'Dashboard - SIGISKAM')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Create Users</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                            <li class="breadcrumb-item active">Create Users</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <form action="{{ route('users.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="mb-2">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Silahkan masukkan nama anda" required>
                    <div class="invalid-feedback">
                        Silahkan masukkan nama anda!
                    </div>
                </div>
                <div class="mb-2">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        placeholder="Silahkan masukkan username anda" required>
                    <div class="invalid-feedback">
                        Silahkan masukkan username anda!
                    </div>
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password"
                        placeholder="Silahkan masukkan password  anda" required>
                    <div class="invalid-feedback">
                        Silahkan masukkan password anda!
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>
            </form>
        </div>


    </div>
@endsection
