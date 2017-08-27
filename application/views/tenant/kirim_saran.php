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
            <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Form Kirim Saran</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <input type="hidden" class="form-control" id="id_saran" value="0" />
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" disabled="" id="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>"/>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" disabled="" id="email" value="<?php echo $data['email']; ?>"/>
              </div>
              <div class="form-group">
                <label for="saran">Isi Saran</label>
                <textarea class="form-control" rows="7" minlength="35" id="saran" placeholder="Isi Saran Minimal 35 Karakter"></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn bg-orange pull-right" id="simpan-saran">Simpan</button>
              </div>
            </div>
            </div>
          </div>
        </div>
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->