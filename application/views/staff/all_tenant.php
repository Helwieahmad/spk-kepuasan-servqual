<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

     <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Tenant / Pengunjung
            <small>Semua Data Tenant / Pengunjung</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Semua Data Tenant / Pengunjung</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box box-default">
            <div class="box-body">

                <table class="tenant-table table table-bordered table-striped dt-responsive">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>NPM/NIDN/NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Status</th>
                    <th>Prodi/Unit</th>
                    <th>Tanggal Daftar</th>
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
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

       <div class="modal fade" id="modal-foto" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"> 
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h4>Ganti Foto</h4>
                <p >Nama Tenant yang akan ganti foto : <strong><span class="nama_lengkap text-purple"></span></strong></p>  
            </div>
            <div class="modal-body">
                <input type="hidden" class="id_tenant" value="" >
                <div class="area-foto dropzone well dz-clickable"></div>
            </div>
            <div class="modal-footer">
                <button class="btn bg-purple ok">Ok</button>
                <button class="btn bg-purple fakeOk disabled ">Ok</button>
            </div>
        </div>
    </div>
 </div>