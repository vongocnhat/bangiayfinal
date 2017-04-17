<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    {{-- Add Css --}}
    <base href="{{ asset('/') }}">

    {{--End Add Css --}}

<!-- Bootstrap Core CSS -->
    <link href="admin_assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="admin_assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin_assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    {{-- freezeheader css --}}
    <link href="admin_assets/freezeheader/css/fixedHeader.dataTables.min.css" rel="stylesheet" />

    {{-- Add Css --}}
    <link href="admin_assets/myjsandcss/css/table.css" rel="stylesheet" />
    <link href="admin_assets/select2/css/select2.css" rel="stylesheet" />

    {{--fileupload--}}
    <link href="admin_assets/myjsandcss/css/fileupload.css" rel="stylesheet" />

    @yield('css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('quanly.layoutadmin.header')

        <!-- Page Content && yield -->
        @include('quanly.layoutadmin.content')
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="admin_assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="admin_assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="admin_assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin_assets/dist/js/sb-admin-2.js"></script>

    {{-- Add search select --}}
    <script src="admin_assets/select2/js/select2.js"></script>
    
    {{--my jquery--}}
    <script src="admin_assets/myjsandcss/js/myjquery.hidemenu.js"></script>

    <script src="admin_assets/myjsandcss/js/myjquery.table.js"></script>
@if(strstr(Request::route()->getName(), '.') == '.index')
    {{--freezeheader--}}
    <script src="admin_assets/freezeheader/js/dataTables.fixedHeader.min.js"></script>
@else
    <script src="admin_assets/myjsandcss/js/myjquery.form_validation.js"></script>
    {{--fileupload--}}
    <script src="admin_assets/myjsandcss/js/myjquery.fileupload.js"></script>
@endif

    @yield('script')

</body>

</html>
