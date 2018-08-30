<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">
    <title>Admin</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
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
     <!-- Navigation -->
     <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Admin</a>
        </div>
        <!-- /.navbar-header -->
        {{-- @if(Auth::check()) --}}
        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                     @if(Auth::check())
                    <li><a><i class="fa fa-user fa-fw"></i>{{ Auth::user()->email }}</a>
                    </li>
                    @endif
                    <li class="divider"></li>
                    <Logout></Logout>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <router-link to="/"><i class="fa fa-dashboard fa-fw"></i> Dashboard</router-link>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <router-link to="/category"> List Category</router-link>
                            </li>
                            <li>
                                <router-link to="/category/add">Add Category</router-link>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube fa-fw"></i> Posts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                {{-- <router-link >List Post</router-link> --}}
                            </li>
                            <li>
                                <router-link to="{name:'postadd'}">Add Post</router-link>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube fa-fw"></i> Product<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <router-link to="/product">List Product</router-link>
                            </li>
                            <li>
                                <router-link to="/product/create">Add Product</router-link>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cube fa-fw"></i>Role<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <router-link to="/role">List Role</router-link>
                            </li>
                            <li>
                                <router-link to="/role/create">Add Role</router-link>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <router-link :to="{name:'ListUser'}">List User</router-link>
                            </li>
                            <li>
                                <router-link :to="{name:'AddUser'}">Add User</router-link>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <p>ban có thể sửa</p>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
        {{-- @endif --}}
        <notifications group="foo" />
    </nav>
    <router-view/>


</div>
<!-- /#wrapper -->
<script src="{{ mix('js/app.js') }}"></script>
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
{{-- <link href="backend/styles.css" rel="stylesheet"> --}}
{{-- <script src="backend/lumino.glyphs.js"></script> --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
{{--     <script>
        CKEDITOR.replace('description', {
            filebrowserBrowseUrl: '{{ asset('backend/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('backend/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('backend/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        } );
    </script> --}}
</body>

</html>
