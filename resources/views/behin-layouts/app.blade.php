
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('public/behin/behin-dist/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ url('public/behin/behin-dist/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    {{-- <link rel="stylesheet" href="{{ url('public/behin/behin-dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ url('public/behin/behin-dist/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public/behin/behin-dist/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    {{-- <link rel="stylesheet" href="{{ url('public/behin/behin-dist/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}"> --}}
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('public/behin/behin-dist/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    {{-- <link rel="stylesheet" href="{{ url('public/behin/behin-dist/plugins/summernote/summernote-bs4.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ url('public/behin/behin-dist/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/behin/behin-dist/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/behin/behin-dist/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/behin/behin-dist/plugins/toastr/toastr.min.css')}}">
    @yield('style')

    <script src="{{ url('public/behin/behin-dist/plugins/jquery/jquery.min.js') . '?' . config('app.version') }}"></script>
    <script src="{{ url('public/behin/behin-dist/plugins/datatables/jquery.dataTables.js')  . '?' . config('app.version') }}"></script>
    <script src="{{ url('public/behin/behin-dist/plugins/datatables/dataTables.bootstrap4.js')  . '?' . config('app.version') }}"></script>
    <script src="{{ url('public/behin/behin-dist/persian-date-picker/persian-date.js')  . '?' . config('app.version') }}"></script>
    <script src="{{ url('public/behin/behin-dist/persian-date-picker/persian-datepicker.js')  . '?' . config('app.version') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="{{ url('public/behin/behin-js/ajax.js')  . '?' . config('app.version') }}"></script>
    <script src="{{ url('public/behin/behin-js/dataTable.js')  . '?' . config('app.version') }}"></script>
    <script src="{{ url('public/behin/behin-js/dropzone.js')  . '?' . config('app.version') }}"></script>
    @yield('script_in_head')

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('behin-layouts.header')

        @include('behin-layouts.main-sidebar')
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>



        <footer class="main-footer">
            {{-- <strong> &copy; 2018 <a href="http://github.com/hesammousavi/">حسام موسوی</a>.</strong> --}}
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

        <script src="{{ url('public/behin/behin-dist/plugins/bootstrap/js/bootstrap.bundle.min.js')  . '?' . config('app.version') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="{{ url('public/behin/behin-dist/plugins/knob/jquery.knob.js')  . '?' . config('app.version') }}"></script>
        <script src="{{ url('public/behin/behin-dist/plugins/daterangepicker/daterangepicker.js')  . '?' . config('app.version') }}"></script>
        <script src="{{ url('public/behin/behin-dist/plugins/datepicker/bootstrap-datepicker.js')  . '?' . config('app.version') }}"></script>
        <script src="{{ url('public/behin/behin-dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')  . '?' . config('app.version') }}"></script>
        <script src="{{ url('public/behin/behin-dist/dist/js/adminlte.js')  . '?' . config('app.version') }}"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script src="{{ url('public/behin/behin-dist/plugins/select2/select2.full.min.js')}}"></script>
        <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
        <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>



        <script>

            function initial_view(){
                $('.select2').select2();
                $('.select2').css('width', '100%')
                $(".persian-date").persianDatepicker({
                    viewMode: 'day',
                    initialValue: false,
                    format: 'YYYY-MM-DD',
                    initialValueType: 'persian'
                });
            }







        </script>

        <script src="{{ url('public/behin/behin-js/loader.js')  . '?' . config('app.version') }}"></script>
        <script src="{{ url('public/behin/behin-js/scripts.js')  . '?' . config('app.version') }}"></script>

        @yield('script')
    </div>



</body>

</html>
