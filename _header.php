<?php
require_once "_config/config.php";
require "_config/libs/vendor/autoload.php";
require "_config/libs/vendor/moontoast/math/src/Moontoast/Math/BigNumber.php";

if (isset($_SESSION['user']) == null) {
     // echo "<script>window.location='".base_url('auth/logout.php')."';</script>";    
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | RumahSakit</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url('bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url('bower_components/Ionicons/css/ionicons.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('dist/css/AdminLTE.min.css')?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url('dist/css/skins/_all-skins.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <!-- jQuery 3 -->
  <script src="<?=base_url('bower_components/jquery/dist/jquery.min.js')?>"></script>
  <!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- DataTables -->
  <script src="<?=base_url('bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?=base_url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>R</b>ST</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Rumah</b>Sakit</span>
    </a>
    <!-- Header Navbar: style can be found../ in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          
          <!-- User Account: style can be found../ in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url('dist/img/user2-160x160.jpg')?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$_SESSION['user'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url('dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image">

                <p>
                  <?=$_SESSION['user'];?> - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?=base_url('auth/logout.php');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found../ in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['user'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
   
      <!-- sidebar menu: : style can be found../ in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
	        <li>
	        	<a href="<?=base_url('dashboard');?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
	        </li>
		        <li>
		        	<a href="<?=base_url('pasien');?>"><i class="fa fa-wheelchair"></i> <span>Data Pasien</span></a>
		        </li>
			        <li>
			        	<a href="<?=base_url('dokter');?>"><i class="fa fa-user-md"></i> <span>Data Dokter</span></a>
			        </li>
		        <li>
		        	<a href="<?=base_url('poliklinik');?>"><i class="fa fa-hospital-o"></i> <span>Data PoliKlinik</span></a>
		        </li>
	        <li>
	        	<a href="<?=base_url('obat');?>"><i class="fa fa-medkit"></i> <span>Data Obat</span></a>
	        </li>
        <li>
        	<a href="<?=base_url('dashboard');?>"><i class="fa fa-heartbeat"></i> <span>Rekam Medis</span></a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
 
  <!-- /.content-wrapper -->

