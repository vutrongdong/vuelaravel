<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">
    <title>Admin</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Bootstrap Core CSS -->
    <link href="backend/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="backend/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="backend/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="backend/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="backend/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="backend/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <script src="backend/ckeditor/ckeditor.js"></script>
    <script src="backend/ckfinder/ckfinder.js"></script>
</head>

<body>

    <div id="app">

        <App></App>

    </div>
    <!-- /#wrapper -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <!-- jQuery -->
    <script src="backend/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="backend/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="backend/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="backend/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="backend/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <link href="backend/datepicker3.css" rel="stylesheet">
    
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>

</body>

</html>
