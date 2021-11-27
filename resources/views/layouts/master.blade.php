<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- [CSS] -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    <!-- [CSS] -->

    <!-- [FAVICON] -->
    <link rel="shortcut icon" href="{{ asset('assets/images/pharmacy-logo.png') }}" type="image/png">
    <!-- [FAVICON] -->

    <title>{{ __('Pharmacy System') }}</title>
</head>
<body>
    <!-- ================= [Header] ================= -->
    @include('layouts.header')
    <!-- ================= [Header] ================= -->
    
    <!-- ================= [Content] ================= -->
    <main class="container">
        @yield('content')
    </main>
    <!-- ================= [Content] ================= -->
    
    <!-- ================= [Footer] ================= -->
    @include('layouts.footer')
    <!-- ================= [Footer] ================= -->

    <!-- [JS] -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- [JS] -->

    <!-- [Session Messages] -->
    @if (session()->has('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif
    <!-- [Session Messages] -->

    <!-- [Default URL] -->
    <script>
        var url = "{{ url('/') }}";
    </script>
    <!-- [Default URL] -->
</body>
</html>