<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
    function path_adm(){echo base_url()."an-theme/admin";}
    function rpath_adm(){return base_url()."an-theme/admin";}
    $name=$this->session->userdata('name_user');
    $levela=($user_level=='1')?"Administrator":"Staff";
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
     <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php path_adm() ?>/plugins/datepicker/datepicker3.css">
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
          $(".poter-admin").fadeOut("slow");;
        });
    </script>
  </head>  
  <body class="skin-blue sidebar-mini">
    <div class="poter-admin">
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
                  <span class="hidden-xs"><?php echo $user; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?php echo $path_avatar; ?>" onerror="this.src='<?php echo base_url() ?>an-component/media/upload-user-avatar/NoImage.jpg'" class="img-circle" alt="User Image" />
                    <p>
                       <?php echo $nama; ?>
                       <small><?php echo $name; ?></small>
                      
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url() ?>saya-disembunyikan/all_user" class="btn btn-default btn-flat">Profil</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url() ?>saya-disembunyikan/logout" class="btn btn-default btn-flat">Sign out</a>
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
            <div class="pull-left image">
              <img src="<?php echo $path_avatar; ?>" onerror="this.src='<?php echo base_url() ?>an-component/media/upload-user-avatar/NoImage.jpg'" style="height:50px !important;width: :50px !important; border-radius: 50% !important;" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $user; ?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- End Sidebar User Panel -->
        
          <!--- MULAI MENU -->
          
          <ul class="sidebar-menu">
            
            <li class='<?php if($npage==1){ echo'active';} ?>'><a href="<?php echo $burl; ?>"><i class='fa fa-home'></i> <span>Halaman Utama</span></a> </li>
          
            <li class="header "><b>MASTER DATA</b></li>
            <li class='treeview  <?php if(($npage==2)OR($npage==3)){ echo'active';} ?>'>
              <a href='#'><i class='fa fa-copy '></i><span class="">Kuisioner</span><i class="fa fa-angle-left pull-right "></i></a>
              <ul class='treeview-menu'>
                <li class='<?php if($npage==2){ echo'active';} ?>'><a href='<?php echo $burl; ?>/all_kuisioner'><i class='fa fa-copy '></i><span class="">Semua Kuisioner</span></a></li>
                <li class='<?php if($npage==3){ echo'active';} ?>'><a href='<?php echo $burl; ?>/kuisioner'><i class='fa fa-pencil-square-o '></i><span class="">Tambah Kuisioner</span></a></li>
              </ul>
            </li>
            <li class='treeview  <?php if(($npage==4)OR($npage==5)){ echo'active';} ?>'>
              <a href='#'><i class='fa fa-list-ol '></i><span class="">Kriteria</span><i class="fa fa-angle-left pull-right "></i></a>
              <ul class='treeview-menu'>
              <li class='<?php if($npage==4){ echo'active';} ?>'><a href='<?php echo $burl; ?>/all_kriteria'><i class='fa fa-list-ol '></i><span class="">Semua Kriteria</span></a></li>
              <li class='<?php if($npage==5){ echo'active';} ?>'><a href='<?php echo $burl; ?>/kriteria'><i class='fa fa-check-square-o '></i><span class="">Tambah Kriteria</span></a></li>
                </ul>
            </li>
            <li class='treeview  <?php if(($npage==6)OR($npage==7)){ echo'active';} ?>'>
              <a href='#'><i class='fa fa-cube '></i><span class="">Dimensi</span><i class="fa fa-angle-left pull-right "></i></a>
              <ul class='treeview-menu'>
                <li class='<?php if($npage==6){ echo'active';} ?>'><a href='<?php echo $burl; ?>/all_dimensi'><i class='fa fa-database '></i><span class="">Semua Dimensi</span></a></li>
                <li class='<?php if($npage==7){ echo'active';} ?>'><a href='<?php echo $burl; ?>/dimensi'><i class='fa fa-external-link '></i><span class="">Tambah Dimensi</span></a></li>
              </ul>
            </li>
            <li class='treeview  <?php if(($npage==8) OR ($npage==9) OR ($npage==35)){ echo'active';} ?>'>
              <a href='#'><i class='fa fa-user '></i><span class="">Tenant / Pengunjung</span><i class="fa fa-angle-left pull-right "></i></a>
              <ul class='treeview-menu'>
                <li class='<?php if($npage==8){ echo'active';} ?>'><a href='<?php echo $burl; ?>/all_tenant'><i class='fa fa-group '></i><span class="">Semua Tenant</span></a></li>
                <li class='<?php if($npage==9){ echo'active';} ?>'><a href='<?php echo $burl; ?>/tenant'><i class='fa fa-user-plus '></i><span class="">Tambah Tenant</span></a></li>
                <li class='<?php if($npage==35){ echo'active';} ?>'><a href='<?php echo $burl; ?>/tenant'></a></li>
              </ul>
          
            <li class='<?php if($npage==10){ echo'active';} ?>'><a href="<?php echo $burl; ?>/kotak_saran"><i class='fa fa-envelope '></i><span class="">Kotak Saran</span></a></li>      
            </li>

            <li class='treeview <?php if($npage==11 || $npage==12 || $npage==13){ echo'active';} ?>'>
              <a href='#'><i class='fa fa-newspaper-o '></i><span class="">Data Pendukung</span><i class="fa fa-angle-left pull-right "></i></a>
              <ul class='treeview-menu'>
                <li class="<?php if($npage==11){ echo'active';} ?>"><a href="<?php echo $burl; ?>/all_status"><i class='fa fa-th-large '></i><span class="">Data Status</span></a></li>
                <li class="<?php if($npage==12){ echo'active';} ?>"><a href="<?php echo $burl; ?>/all_fakultas"><i class='fa fa-institution '></i><span class="">Data Fakultas</span></a></li>
                <li class="<?php if($npage==13){ echo'active';} ?>"><a href="<?php echo $burl; ?>/all_prodi"><i class='fa fa-graduation-cap '></i><span class="">Data Prodi dan Unit</span></a></li>
              </ul>
            </li>
            
            <li class='header '><b>PENILAIAN</b></li>
            <li class='treeview <?php if($npage==14){ echo'active';} ?>'>
              <a href='<?php echo $burl; ?>/ekspektasi_lab'><i class='fa fa-file-text '></i><span class="">Ekspektasi K.a. Lab</span></i></a>
            </li>
            <li class='treeview <?php if($npage==15){ echo'active';} ?>'>
              <a href='<?php echo $burl; ?>/hasil_kuisioner'><i class='fa fa-file-text '></i><span class="">Hasil Kuisioner</span></i></a>
            </li>
            <li class='treeview <?php if($npage==16){ echo'active';} ?>'>
            <a href='<?php echo $burl; ?>/hasil_servqual'><i class='fa fa-cubes '></i><span class="">Hasil Servqual</span></i></a>
            </li>

          <!---  <li class='header '><b>LAPORAN</b></li>
            <li class='<?php if($npage==17){ echo'active';} ?>'><a href="<?php echo $burl; ?>/kontak_masuk"><i class='fa fa-print '></i><span class="">Lap. Hasil Kuisioner</span></a></li>
            <li class='<?php if($npage==18){ echo'active';} ?>'><a href="<?php echo $burl; ?>/kontak_masuk"><i class='fa fa-print '></i><span class="">Lap. Hasil Servqual</span></a></li>
            <li class='<?php if($npage==19){ echo'active';} ?>'><a href="<?php echo $burl; ?>/kontak_masuk"><i class='fa fa-print '></i><span class="">Lap. Prioritas Pembenahan</span></a></li>
            <li class='<?php if($npage==20){ echo'active';} ?>'><a href="<?php echo $burl; ?>/kontak_masuk"><i class='fa fa-print '></i><span class="">Lap. Kotak Saran</span></a></li>
            ---------->
            <li class='header '><b>PENGATURAN</b></li>
            <li class='treeview <?php if(($npage==21)OR( $npage==22)){ echo'active';} ?>'>
              <a href="#"><i class='fa fa-user '></i><span class="">User</span><i class="fa fa-angle-left pull-right "></i></a>
              <ul class='treeview-menu'>
               <li class='<?php if($npage==21){ echo'active';} ?>'><a href='<?php echo $burl; ?>/all_user'><i class='fa fa-sitemap '></i><span class="">Managemen User</span></a></li>
               <li class='<?php if($npage==22){ echo'active';} ?>'><a href='<?php echo $burl; ?>/user_baru'><i class='fa fa-user-plus '></i><span class="">Tambah User</span></a></li>
              </ul>
              <li class='treeview <?php if(($npage==23)){ echo'active';} ?>'>
              <a href='<?php echo $burl; ?>/log'><i class='fa fa-exchange '></i><span class="">Log</span></a>  
            </li>
            </li>
          </ul><!-- /.sidebar-menu -->
          <br>
          <br>
        </section>
        <!-- /.sidebar -->
      </aside>