<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>
 <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1><?php echo ($modul=='new')?"Tambah Kuisioner":"Edit Kuisioner" ?> 
          <small><?php echo ($modul=='edit')?"Edit Kuisioner":"Tambah Kuisioner" ?></small></h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active"><?php echo ($modul=='edit')?"Edit Kuisioner":"Tambah Kuisioner" ?></li> 
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="row">
        <div class="col-md-9">
            
        <div class="box box-primary">
            <div class="box-body">
                    <div class='form-group'>
                        <label for='periode'>Periode Kuisioner</label>
                          <select class='form-control' id='periode' required>
                              <?php
                                  if ($periode==1) {
                                    echo"<option value='0' selected>Pilih Periode</option><option selected value='1'>Semester Ganjil</option><option value='2'>Semester Genap</option>";
                                  }elseif ($periode==2) {
                                    echo "<option value='0' selected>Pilih Periode</option><option value='1'>Semester Ganjil</option><option selected value='2'>Semester Genap</option>";
                                  }else{
                                    echo "<option value='0' selected>Pilih Periode</option><option value='1'>Semester Ganjil</option><option value='2'>Semester Genap</option>";
                                    }
                              ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="tahun">Tahun</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                        </div>
                        <input id="tahun" value="<?php echo $tahun ?>" class="form-control pull-right" type="text">
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='aktif'>Aktifkan Kuisioner</label>
                          <select class='form-control' id='aktif' required>
                              <?php
                                  if ($aktif==Y) {
                                    echo"<option value=''>Pilih Aktifkan Kuisioner</option><option selected value='Y'>Aktif</option><option value='N'>Tidak Aktif</option>";
                                  }elseif ($aktif==N) {
                                    echo "<option value=''>Pilih Aktifkan Kuisioner</option><option value='Y'>Aktif</option><option selected value='N'>Tidak Aktif</option>";
                                  }else{
                                    echo "<option value='' selected>Pilih Aktifkan Kuisioner</option><option value='Y'>Aktif</option><option value='N'>Tidak Aktif</option>";
                                  }
                              ?>
                        </select>
              </div>
                    <input type='hidden' id='id_kuisioner' value='<?php echo $id_kuisioner ?>' >
                    <div class="form-group">
                      <label class="control-label" for="deskripsi">Deskripsi</label>

                      <div class="control-form">
                        <textarea placeholder="Deskripsi" id="deskripsi" class="form-control" rows="5" required><?php echo $deskripsi ?></textarea>
                      </div>
                    </div>
                   <!--- <div class="form-group">
                      <label class="control-label" for="kriteria">Pilih Kriteria</label> 
                      <small class="pull-right text-blue" >terpilih <span class="area_count">0</span> Kriteria(s)</small>
                      <div class="well-kriteria">
                      <?php
                        if($list_kriteria!=false){
                        echo $list_kriteria;
                      }
                      ?>
                    </div>
                  </div> -->
              <!-- /.box-body -->
              <div class="box-footer">
                <button class="btn bg-purple pull-right" id="simpan-kuisioner" type="submit">Simpan</button>
              </div>
              <!-- /.box-footer -->
                </div>
              </div>
            </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
