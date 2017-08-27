<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Halaman
            <small><?php echo $title; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active"><?php echo $title; ?></li>
           
          </ol>
        </section>

        <!-- Main content -->
       <section class="content">
        <div class="row">
         <div class="col-md-7"> 
          <div class="box box-default">
          <div class="box-header with-border">
              <h3 class="box-title">Form Dimensi</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label for="id_dimensi">ID Dimensi</label>
                <input type="text" disabled="" class="form-control" id="id_dimensi" value="<?php echo $data['id_dimensi']; ?>" />
              </div>
              <div class="form-group">
                <label for="dimensi">Dimensi</label>
                <input type="text" class="form-control" id="dimensi" value="<?php echo $data['dimensi']; ?>" />
                </div>
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" rows="7" id="keterangan"><?php echo $data['keterangan']; ?></textarea>
            </div>
              
              <div class="form-group">
                <button class="btn bg-purple" id="simpan-dimensi">Simpan</button>
              </div>
              
          </div>
        </div>
      </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->