<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shop bán quần áo</title>
    <base href="{{asset('')}}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="admin/dist/css/admin.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="admin/plugins/toastr/toastr.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="admin/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
    
    <script src="admin/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Toastr -->
    <script src="admin/plugins/toastr/toastr.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- DataTables -->
    <script src="admin/plugins/datatables/jquery.dataTables.js"></script>
    <script src="admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- Select2 -->
    <script src="admin/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
 
    <script type="text/javascript">
        var env_url = "{{ env('url_image') }}";
        var notify = "{{session('notify')}}";
        var error = "{{session('error')}}";
        var success = "{{session('success')}}";
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed sidebar-collapse">
    <div class="wrapper">

        <!-- Navigation -->
        @include('admin.header')

        @include('admin.menu')
        
        @yield('content')
       
    </div>
    <!-- Bootstrap 4 -->
    <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="admin/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="admin/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    @if (session('error'))
        <script>
            toastr.error(error)
        </script>
    @elseif(session('success'))
        <script>
            toastr.success(success)
        </script>
    @endif
    {{-- <script type="text/javascript">
        var options = {
            filebrowserImageBrowseUrl: '{{route('laravel.filemanager')}}', 
            filebrowserImageUploadUrl: '{{route('laravel.filemanager.upload', ['_token'=> csrf_token()])}}',
            filebrowserBrowseUrl: '{{route('laravel.filemanager')}}',
            filebrowserUploadUrl: '{{route('laravel.filemanager.upload', ['_token'=> csrf_token()])}}'
        };
        CKEDITOR.replace( 'ckeditor',options);
    </script> --}}

    <script type="text/javascript">
        CKEDITOR.replace( 'ckeditor', {
            filebrowserUploadUrl: "{{route('admin.image.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
        });
    </script>
</body>
</html>
