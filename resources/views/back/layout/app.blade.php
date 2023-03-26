<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta16
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Empty page - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="{{ asset('assets/dist/css/tabler.min.css?1668287865') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dist/css/tabler-flags.min.css?1668287865') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dist/css/tabler-payments.min.css?1668287865') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dist/css/tabler-vendors.min.css?1668287865') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dist/css/demo.min.css?1668287865') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    {{-- DATATABLES CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css">
    {{--
    <link rel="stylesheet" href="{{ asset('assets/dist/libs/datatables-bs4/css/dataTables.bootstrap4.min.css') }}"> --}}

    {{-- SWEETALERT 2 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
    </style>

    <!-- Tabler Core -->
    <script src="{{ asset('assets/dist/js/tabler.min.js?1668287865') }}" defer></script>
    <script src="{{ asset('assets/dist/js/demo.min.js?1668287865') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    {{-- DATATABLES JS--}}
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap5.min.js"></script>
    {{-- <script src="{{ asset('assets/dist/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script> --}}

    {{-- SweetAlert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>

<body>
    {{-- <script src="{{ asset('assets') }}/dist/js/demo-theme.min.js?1668287865"></script> --}}
    <div class="page">
        <!-- Navbar -->
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            @include('back.layout.header')
        </header>
        <div class="navbar-expand-md">
            @include('back.layout.navbar')
        </div>
        <div class="page-wrapper">

            @yield('content')

            <footer class="footer footer-transparent d-print-none">
                @include('back.layout.footer')
            </footer>
        </div>
    </div>
    @stack('scripts')
</body>

</html>