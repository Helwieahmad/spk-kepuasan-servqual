<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>
 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Tenant
            <small>Tambahkan Tenant / Pengunjung Baru</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">Tenant Baru</li>
          
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
              <div class='box box-default'>
                <div class="box-header with-border">
                    <h4 class="box-title">Form Tambah</h4>
                </div>
                <div class='box-body'>
                  <form class='form-tenant-baru' id='loved'>
                      <input type='hidden' class='sesi-from' value='<?php echo rand(0,100).rand(10,500).date('dym') ?>' >
                    <div class="row">
                      <div class="col-md-6">
                          <div class='form-group'>
                            <label for='npm'>NPM / NIDN / NIK</label> <span class='label label-danger'></span>
                            <div class='input-group has-feedback'><span class="input-group-addon" id="npm"><i class='fa fa-user'></i></span>
                              <input type='number' class='form-control' id='npm' placeholder='NPM / NIDN / NIK' data-toggle='tooltip' data-placement='top' title='Masukkan sesuai dengan status Anda. Masukkan NPM apabila Anda Mahasiswa, NIDN jika Dosen dan NIK jika Karyawan' ><span class='form-control-feedback'></span>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label for='password'>Password</label> <span class='label label-danger'></span>
                            <div class='input-group has-feedback'><span class="input-group-addon" id="password"><i class='fa fa-lock'></i></span>
                            <input type='password' class='form-control' id='password' placeholder='Password' data-toggle='tooltip' data-placement='top' title='Minimal 5 karakter' ><span class='form-control-feedback'></span>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label for='repassword'>Konfirmasi Password</label> <span class='label label-danger'></span>
                              <div class='input-group has-feedback'><span class="input-group-addon" id="repassword"><i class='fa fa-lock'></i></span>
                              <input type='password' class='form-control' id='repassword' placeholder='Masukan kembali password' data-toggle='tooltip' data-placement='top' title='Password harus sama'><span class='form-control-feedback'></span>
                              </div>
                          </div>
                          <div class='form-group'>
                            <label for='nama_lengkap'>Nama Lengkap</label> <span class='label label-danger'></span>
                            <div class='input-group has-feedback'><span class="input-group-addon" id="nama_lengkap"><i class='fa fa-street-view'></i></span>
                            <input type='text' class='form-control' id='nama_lengkap' placeholder='Nama Lengkap' data-toggle='tooltip' data-placement='top' title='Masukkan nama lengkap' ><span class='form-control-feedback'></span>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label for='email'>Email</label> <span class='label label-danger'></span>
                            <div class='input-group has-feedback'><span class="input-group-addon" id="email"><i class='fa  fa-envelope'></i></span>
                               <input type='text' class='form-control' id='email' placeholder='email' data-toggle='tooltip' data-placement='top' title='Masukkan Email' ><span class='form-control-feedback'></span>
                            </div>
                          </div>
                          <div class='form-group '>
                              <label for='status'>Status</label>
                                <select name="status" id="status" class="form-control">
                                <option value="0" selected>Pilih Status</option>
                                <?php
                                if($list_status!=false){
                                  echo $list_status;
                                }
                                 ?>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div id="unit" style="display: none;">
                          <div class="form-group">
                            <label class="control-label">Unit</label>
                            <select class="form-control unit">
                              <option value="">--Select--</option>
                            </select>
                          </div>
                        </div>
                        <div id="fakultas" style="display: none;">
                          <div class="form-group">
                            <label class="control-label">Fakultas</label>
                            <select class="form-control fakultas">
                              <option value="">--Select--</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Prodi</label>
                            <select class="form-control prodi">
                              <option value="">--Select--</option>
                            </select>
                          </div>
                        </div>
                        <div class='form-group'>
                          <label>Foto Profil</label>
                          <div class='dropzone avatar_tenant well'></div>
                        </div>
                          <hr>
                        <div class="form-group">
                          <button type='submit' class='btn bg-purple'>Simpan</button>
                        </div>
                    </div>
                  </form>
                </div>           
              </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
