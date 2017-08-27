<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Kriteria
            <small>Semua Data Kriteria</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Semua Data Kriteria</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box box-default">
            <div class="box-body">

                <table class="slug-table table table-bordered table-striped dt-responsive">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kriteria</th>
                    <th>Dimensi</th>
                    <th>Status Aktif</th>
                    <th width="100">Action</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                   echo $hasil;
                    ?>
                  </tbody>
                </table>
          </div>
        </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->