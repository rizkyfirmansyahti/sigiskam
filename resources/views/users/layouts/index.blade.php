<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
        @yield('title', 'SIGISKAM')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link href="/images/logo_kampar.png" rel="icon">
    {{-- VENDOR STYLE --}}
    @include('users.layouts.vendor-css')
</head>

<body>
    @yield('content')

    {{-- SCRIPT --}}
    @include('users.layouts.vendor-scripts')

</body>

</html>
