<!doctype html>
<html lang="en">

<head>
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <meta charset="utf-8" />
    <title>SIGISKAM - Kampar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link href="/images/logo.png" rel="icon">
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body style="background-color: #f8f8fb">
    {{-- @include('sweetalert::alert') --}}

    <div id="layout-wrapper">
        {{-- TOPBAR --}}
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex" style="border: none">
                    <div class="navbar-brand-box" style="background-color: white">
                        <a href="/" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="/images/logo.png" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="/images/logo.png" alt="" height="24"> <span
                                    class="logo-txt text-danger">SIGISKAM</span>
                            </span>
                        </a>

                        <a href="/" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="/assets/images/logo.png" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="/assets/images/logo.png" alt="" height="24"> <span
                                    class="logo-txt text-danger">Smart Agenda</span>
                            </span>
                        </a>
                    </div>
                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (auth()->check())
                                <span class="bg-danger"
                                    id="profile-icon2">{{ substr(auth()->user()->name, 0, 1) }}</span>
                            @endif
                            <span class="d-none d-xl-inline-block ms-1 fw-medium">
                                @if (auth()->check())
                                    {{ auth()->user()->name }}
                                @endif
                            </span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="/admin/profile"><i
                                    class="fas fa-user font-size-16 align-middle me-1"></i> Profil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="/log-out"><i
                                    class="mdi mdi-logout font-size-16 align-middle me-1 text-danger"></i> Keluar</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        {{-- SIDEBAR --}}
        <div class="vertical-menu side">

            <div data-simplebar class="h-100">

                <div id="sidebar-menu">
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" data-key="t-menu" style="color: rgb(186, 172, 172)">Menu</li>
                        <li>
                            <a href="/admin/dashboard"
                                class="{{ Request::is('admin/dashboard*') ? 'active' : 'not-active' }}">
                                <i class="mdi mdi-home-variant-outline"></i>
                                <span data-key="t-dashboard">Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="/admin/all-user"
                                class="{{ Request::is('admin/all-user*') ? 'active' : 'not-active' }}">
                                <i class="mdi mdi-account-outline"></i>
                                <span data-key="t-authentication">Semua Pembicara</span>
                            </a>
                        </li>

                        <li>
                            <a href="/admin/all-meeting"
                                class="{{ Request::is('admin/all-meeting*') ? 'active' : 'not-active' }}">
                                <i class="mdi mdi-calendar-range-outline"></i>
                                <span data-key="t-authentication">Semua Agenda</span>
                            </a>
                        </li>

                        <li>
                            <a href="/admin/all-upcoming"
                                class="{{ Request::is('admin/all-upcoming*') ? 'active' : 'not-active' }}">
                                <i class="mdi mdi-timer-outline"></i>
                                <span data-key="t-pages">Agenda Mendatang</span>
                            </a>
                        </li>



                        <li>
                            <a href="/admin/all-past"
                                class="{{ Request::is('admin/all-past*') ? 'active' : 'not-active' }}">
                                <i class="mdi mdi-history"></i>
                                <span data-key="t-components">Riwayat Agenda</span>
                            </a>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
        {{-- CONTENT --}}
        <div class="main-content">
            <div class="page-content">
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
                        <a href="/admin/all-admin/create "
                            class="btn btn-primary btn-sm waves-effect btn-label waves-light"><i
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
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © GCI Smart Agenda.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Garuda
                                Cyber Indonesia
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </div>

    <script src="/assets/libs/jquery/jquery.min.js"></script>
    <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="/assets/js/pages/form-validation.init.js"></script>
    <script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="/assets/js/pages/datatable-pages.init.js"></script>
    <script src="/assets/js/app.js"></script>

</body>

</html>
