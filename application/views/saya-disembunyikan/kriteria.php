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
         <div class="col-md-7"> 
          <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">Form Kriteria</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <label for="id_kriteria">ID Kriteria</label>
                <input type="hidden" disabled="" class="form-control" id="id_kriteria" value="<?php echo $data['id_kriteria']; ?>" />
              </div>
              <div class="form-group">
                <label for="kriteria">Kriteria</label>
                <input type="text" class="form-control" id="kriteria" value="<?php echo $data['kriteria']; ?>" />
              </div>
              <div class='form-group '>
                        <label for='dimensi'>Pilih Dimensi</label>
                        <select name="id_dimensi" id="id_dimensi" class="form-control">
                        <option value="0" selected>Pilih Dimensi</option>
                        <?php
                        if($list_dimensi!=false){
                          echo $list_dimensi;
                        }
                         ?>
                      </select>
              </div>
              <div class='form-group'>
                        <label for='aktif'>Pilih Aktifkan Kriteria</label>
                          <select class='form-control' id='aktif' required>
                              <?php $aktif= $data['aktif'];
                                  if ($aktif==Y) {
                                    echo"<option value=''>Pilih Aktifkan Kriteria</option><option selected value='Y'>Aktif</option><option value='N'>Tidak Aktif</option>";
                                  }elseif ($aktif==N) {
                                    echo "<option value=''>Pilih Aktifkan Kriteria</option><option value='Y'>Aktif</option><option selected value='N'>Tidak Aktif</option>";
                                  }else{
                                    echo "<option value='' selected>Pilih Aktifkan Kriteria</option><option value='Y'>Aktif</option><option value='N'>Tidak Aktif</option>";
                                  }
                              ?>
                        </select>
              </div>
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" rows="7" id="keterangan"><?php echo $data['keterangan']; ?></textarea>
            </div>
              
              <div class="form-group">
                <button class="btn btn-sm btn-primary" id="simpan-kriteria" type="submit">Simpan</button>
              </div>
              
          </div>
        </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->