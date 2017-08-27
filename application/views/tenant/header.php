<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
    function path_adm(){echo base_url()."an-theme/admin";}
    function rpath_adm(){return base_url()."an-theme/admin";}
    $npm=$this->session->userdata('npm');
    $levela=($tenant_level=='3')?"Administrator":"tenant";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'> 
    <link href="<?php path_adm() ?>/dist/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php path_adm() ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />     
    <!-- Font Awesome Icons -->
     <link href="<?php path_adm() ?>/plugins/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
     <link href="<?php path_adm() ?>/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
     <link href="<?php path_adm() ?>/dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
   <!-- DATATABLES -->
   <link href="<?php path_adm() ?>/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />   
   <link href="<?php path_adm() ?>/plugins/datatables/extensions/Responsive/css/responsive.dataTables.css" rel="stylesheet" type="text/css" />
     <!-- DATATABLES -->
    <link href="<?php path_adm() ?>/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php path_adm() ?>/dist/codemirror/lib/codemirror.css" rel="stylesheet" type="text/css" />
    <link href="<?php path_adm() ?>/dist/codemirror/theme/3024-day.css" rel="stylesheet" type="text/css" />
   <link href="<?php path_adm() ?>/dist/css/style_admin.css" rel="stylesheet" type="text/css" />
  <?php if($npage==10){ ?>
    <link href='<?php path_adm()?>/plugins/jquery-ui-1.11.4/jquery-ui.min.css' rel='stylesheet' type='text/css'> 
  <?php } ?>

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->  
     <script src="<?php path_adm() ?>/dist/js/jquery.min.js"></script>
    <script src="<?php path_adm() ?>/dist/js/modernizr.js" type="text/javascript"></script>
    <script type="text/javascript">
        //paste this code under the head tag or in a separate js file.
        // Wait for window load
        $(window).load(function() {
          // Animate loader off screen
          $(".poter-tenant").fadeOut("slow");;
        });
    </script>
  </head>  
  <body class="sidebar-mini skin-yellow sidebar-mini">
  <div class="poter-tenant">
      <div class="spinner">
      </div>
    </div>

    <div class="wrapper">
      <!-- Main Header -->
      <header class="main-header">
        <!-- Logo -->
        <a href='<?php echo $burl; ?>' class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">UKM</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">UNIKAMA</span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             <!-- <li class='status_koneksi'><a href='#' class='koneksi_stat'></a></li>-->
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?php echo $path_avatar; ?>" onerror="this.src='<?php echo base_url() ?>an-component/media/upload-user-avatar/NoImage.jpg'" class="user-image"  alt="User Image"/>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $npm; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?php echo $path_avatar; ?>" onerror="this.src='<?php echo base_url() ?>an-component/media/upload-user-avatar/NoImage.jpg'" class="img-circle" alt="User Image" />
                    <p>
                       <?php echo $nama; ?>
                       <small><?php echo $npm; ?></small>
                      
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url() ?>tenant/all_user" class="btn btn-default btn-flat">Profil</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url() ?>tenant/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div> <!--End .navbar-custom-menu -->
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="col-sm-12">
              <center>
              <img src="<?php echo $path_avatar; ?>" onerror="this.src='<?php echo base_url() ?>an-component/media/upload-user-avatar/NoImage.jpg'" style="padding:3px;border:2px solid #e27e3f;border-radius:5px;width: 145px; height: 145px" class="img-responsive" alt="User Image" />
            </center>
          </div>
            <div class="col-sm-12">
              <h6 class="text-center" style="color:#fff"><?php echo $nama; ?></h6>
              <!-- Status -->
              <h6><a href="#" ><center><i class="fa fa-circle text-success"></i> Online</center></a></h6>
            </div>
          </div>
          <!-- End Sidebar User Panel -->
        
          <!--- MULAI MENU -->
          
          <ul class="sidebar-menu">
            
            <li class="header "><b>Main Navigation</b></li>
            <li class='<?php if($npage==1){ echo'active';} ?>'><a href="<?php echo $burl; ?>"><i class=' fa fa-home'></i> <span class="">Halaman Utama</span></a> </li>
            <li class='<?php if($npage==2){ echo'active';} ?>'><a href="<?php echo $burl; ?>/jawab_kuisioner"><i class=' fa fa-pencil-square'></i> <span class="">Jawab Kuisioner</span></a> </li>
            <li class='<?php if($npage==3){ echo'active';} ?>'><a href="<?php echo $burl; ?>/kirim_saran"><i class=' fa fa-envelope'></i> <span class="">Kirim Saran</span></a> </li>
            <li class='<?php if($npage==4){ echo'active';} ?>'><a href="<?php echo $burl; ?>/edit_tenant"><i class=' fa fa-user'></i> <span class="">Edit Profil</span></a> </li>
          </ul><!-- /.sidebar-menu -->
          <br>
          <br>
        </section>
        <!-- /.sidebar -->
      </aside>