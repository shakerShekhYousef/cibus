<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Cibus - Discover & Book the best restaurants at the best price">
    <meta name="author" content="Cibus">
    <title>{{ config('app.name') }} | @yield('pageTitle')</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{asset('frontend/img/cibus-icon.png')}}" type="image/x-icon">
    <!-- Styles page layout -->
    @include('layouts.frontend.styles')
    <!-- /Styles page layout -->
    <!-- Custom style section -->
    @yield('custom-style')
    <!-- /Custom style section -->
</head>
<body>
<!-- Header page layout -->
@include('layouts.frontend.header')
<!-- /Header page layout -->
<!-- Main content -->
@yield('content')
<!-- /Main content -->
<!-- Footer -->
@include('layouts.frontend.footer')
<!-- /.Footer -->
<!-- scripts -->
@include('layouts.frontend.scripts')
<!-- /.scripts -->
<!-- scripts for each page -->
@yield('custom-script')
<!-- /.scripts for each page -->
</body>
</html>
