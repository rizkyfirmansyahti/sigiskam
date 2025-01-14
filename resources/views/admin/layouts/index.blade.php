<!doctype html>
<html lang="en">

<head>
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <meta charset="utf-8" />
    <title>
        @yield('title', 'SIGISKAM')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link href="/images/logo.png" rel="icon">
    {{-- VENDOR STYLE --}}
    @include('admin.layouts.vendor-css')
</head>

<body style="background-color: #f8f8fb">
    @include('sweetalert::alert')

    <div id="layout-wrapper">
        {{-- HEADER --}}
        @include('admin.layouts.header')
        {{-- SIDEBAR --}}
        @include('admin.layouts.sidebar')
        {{-- CONTENT --}}
        <div class="main-content">
            <div class="page-content">
                @yield('content')
            </div>
            {{-- FOTTER --}}
            @include('admin.layouts.footer')

        </div>
    </div>

    {{-- SCRIPT --}}
    @include('admin.layouts.vendor-scripts')

</body>

</html>
