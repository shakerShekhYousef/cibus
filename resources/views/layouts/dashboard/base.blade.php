<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | @yield('pageTitle')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/cibus_logo.png') }}" />
    @include('layouts.dashboard.styles')
    @yield('custom-style')
</head>
<body class="hold-transition  sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('assets/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>
    <!-- Navbar -->
    @include('layouts.dashboard.navigation')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @include('layouts.dashboard.sidebar')
    <!-- /.sidebar -->
    <!-- main -->
    <main class="main">
        @yield('content')
    </main>
    <!-- /.main -->
    <!-- Footer -->
    @include('layouts.dashboard.footer')
    <!-- /.Footer -->
</div>
<!-- scripts -->
@include('layouts.dashboard.scripts')
<!-- /.scripts -->
<!-- scripts for each page -->
@yield('custom-script')
<!-- /.scripts for each page -->
</body>
</html>
