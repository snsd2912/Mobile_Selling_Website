<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/layout1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/layout1/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/layout1/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/layout1/css/_all-skins.min.css">
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- load font awesome -->
    <script type="text/javascript" src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- load ckeditor -->
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini layout-fixed">
    <div class="wrapper" >
        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">
                <span class="logo-lg"><b>Admin</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="index.php?controller=users&action=ownedit">
                                <i class="fa fa-th"></i> <span>Thông tin cá nhân</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo $_SESSION["photo"];?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $_SESSION["emname"];?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <?php if($_SESSION["role"]==1) { ?>
                        <li class="header">LAOYOUT ADMIN</li>
                        <li>
                        <a href="index.php?controller=categories">
                            <i class="fa fa-th"></i> <span>Quản lý danh mục</span>
                        </a>
                        </li>
                        <li>
                            <a href="index.php?controller=products">
                                <i class="fa fa-th"></i> <span>Quản lý sản phẩm</span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?controller=users">
                                <i class="fa fa-code"></i> <span>Quản lý nhân viên</span>
                                <span class="pull-right-container">
                                    <!--<small class="label pull-right bg-green">new</small>-->
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?controller=customers">
                                <i class="fa fa-code"></i> <span>Quản lý khách hàng</span>
                                <span class="pull-right-container">
                                    <!--<small class="label pull-right bg-green">new</small>-->
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?controller=distributors">
                                <i class="fa fa-th"></i> <span>Quản lý nhà cung cấp</span>
                            </a>
                        </li>
                        <!-- <li data-toggle="collapse" data-target="#kho" aria-expanded="false" aria-controls="kho">
                            <a > 
                                <i class="fa fa-th"></i> <span>Quản lý kho</span>
                            </a>
                        </li>
                        <div class="collapse" id="kho">
                            <li style="padding: 10px!important">
                                <a href="index.php?controller=import">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-th"></i> <span>Nhập hàng</span>
                                </a>
                            </li>
                            <li style="padding: 10px!important">
                                <a href="index.php?controller=">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-th"></i> <span>Hàng tồn kho</span>
                                </a>
                            </li>
                        </div> -->
                        
                        <li>
                            <a href="index.php?controller=order">
                                <i class="fa fa-th"></i> <span>Quản lý đơn hàng</span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?controller=statistic">
                                <i class="fa fa-th"></i> <span>Thống kê doanh thu</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if($_SESSION["role"]==2) { ?>
                        <li>
                            <a href="index.php?controller=customers">
                                <i class="fa fa-code"></i> <span>Quản lý khách hàng</span>
                                <span class="pull-right-container">
                                    <!--<small class="label pull-right bg-green">new</small>-->
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?controller=order">
                                <i class="fa fa-th"></i> <span>Quản lý đơn hàng</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="index.php?controller=login&action=logout">
                            <i class="fa fa-th"></i> <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <?php echo $this->view; ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.13-pre
            </div>
            <strong>Copyright &copy; 05-2021 <a href="https://www.facebook.com/imsanglv/">SangLV</a>.</strong> All rights
            reserved.
        </footer>
        <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="assets/layout1/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/layout1/js/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/layout1/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/layout1/js/adminlte.min.js"></script>
</body>
</html>
