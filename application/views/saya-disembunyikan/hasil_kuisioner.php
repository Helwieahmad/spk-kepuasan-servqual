<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Halaman Hasil Kuisioner
            <small>Semua Data Hasil Kuisioner</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Semua Data Hasil Kuisioner</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12"> 
              <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Hasil Jawaban Kuisioner</h3>
                </div>
                <div class="box-body">
                  <table class="slug-table table table-bordered table-striped dt-responsive">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Periode</th>
                          <th><center>Tahun</center></th>
                          <th><center>Sangat Setuju</center></th>
                          <th><center>Setuju</center></th>
                          <th><center>Biasa Saja</center></th>
                          <th><center>Tidak Setuju</center></th>
                        </tr>
                        </thead>

                        <tbody>
                          <?php
                         echo $hasil;
                          ?>
                        </tbody>
                  </table>
                <br/>
                <br/>
                </div>
              </div>
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->