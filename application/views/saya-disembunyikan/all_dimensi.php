<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Dimensi
            <small>Semua Data Dimensi</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Semua Data Dimensi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                  <div class="box-body">

                      <table class="slug-table table table-bordered table-striped dt-responsive">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Dimensi</th>
                          <th>Keterangan</th>
                          <th>Action</th>
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
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->