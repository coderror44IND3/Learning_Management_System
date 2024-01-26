<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>PreSkool</title>
    <link rel="shortcut icon" href="{{ asset('admin/assets/img/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/icons/flags/flags.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset ('admin/assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('admin/assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('admin/assets/css/ckeditor.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @notifyCss
</head>

<body>

    <div class="main-wrapper">

        @include('admin.layouts.header')


        @include('admin.layouts.sidebar')


        @yield('content')
    </div>

    <script src="{{ asset('admin/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>
    <script src="{{ asset('admin/assets/js/style.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/js/feather.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset ('admin/assets/js/ckeditor.js') }}"></script>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); // ID From dataTable 
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>

</body>

</html>