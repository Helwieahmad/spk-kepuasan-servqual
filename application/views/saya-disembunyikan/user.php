<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>
 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User Baru
            <small>Tambahkan Pengguna baru untuk mengolah Administrator atau jadikan Staf</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class="active">User Baru</li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

      

          <div class='box box-info'>
          	<div class='box-header'></div>
          	<div class='box-body'>
          		<div class='row'>
          			<div class='col-md-6 col-xs-12'>
          				<form class='form-user-baru' id='love'>
                    <input type='hidden' class='sesi-from' value='<?php echo rand(0,100).rand(10,500).date('dym') ?>' >
          					<div class='form-group'>
          						<label for='username'>Username</label> <span class='label label-danger'></span>
                      <div class='input-group has-feedback'><span class="input-group-addon" id="username"><i class='fa fa-user'></i></span>
          						  <input type='text' class='form-control' id='username' placeholder='username' data-toggle='tooltip' data-placement='top' title='Masukkan Username. Harus unique' ><span class='form-control-feedback'></span>
                      </div>
          					</div>

          					<div class='form-group'>
          						<label for='email'>Email</label> <span class='label label-danger'></span>
                      <div class='input-group has-feedback'><span class="input-group-addon" id="email"><i class='fa  fa-envelope'></i></span>
          					 	   <input type='text' class='form-control' id='email' placeholder='email' data-toggle='tooltip' data-placement='top' title='Masukkan Email' ><span class='form-control-feedback'></span>
                     </div>
          					</div>
	          				
	          				<div class='form-group'>
	          					<label for='nama_lengkap'>Nama Lengkap</label> <span class='label label-danger'></span>
                      <div class='input-group has-feedback'><span class="input-group-addon" id="nama_lengkap"><i class='fa fa-street-view'></i></span>
	          					<input type='text' class='form-control' id='nama_lengkap' placeholder='nama lengkap' placeholder='username' data-toggle='tooltip' data-placement='top' title='Masukkan nama lengkap' ><span class='form-control-feedback'></span>
                      </div>
          					</div>

          					<div class='form-group'>
          						<label for='password'>Password</label> <span class='label label-danger'></span>
                      <div class='input-group has-feedback'><span class="input-group-addon" id="password"><i class='fa fa-lock'></i></span>
          						<input type='password' class='form-control' id='password' placeholder='password' placeholder='username' data-toggle='tooltip' data-placement='top' title='Minimal 5 karakter' ><span class='form-control-feedback'></span>
                      </div>
          					</div>

          					<div class='form-group'>
          						<label for='repassword'>Konfirmasi Password</label> <span class='label label-danger'></span>
                      <div class='input-group has-feedback'><span class="input-group-addon" id="repassword"><i class='fa fa-lock'></i></span>
          						<input type='password' class='form-control' id='repassword' placeholder='Masukan kembali password' placeholder='username' data-toggle='tooltip' data-placement='top' title='Password harus sama'  ><span class='form-control-feedback'></span>
          					</div>
                  </div>
          			</div>   
                <div class="col-md-6 col-xs-12">
                    <div class='form-group'>
                      <label>Foto</label>
                      <div class='dropzone avatar_user well'></div>
                    </div>
                      <div class='form-group '>
                        <label for='leveladmin'>Level User</label>
                          <select class='form-control' name='admin' id='leveladmin'>
                          <option value='biasa' selected>Staff</option>
                          <option value='super'>Administrator</option>
                        </select>
                      </div>

                    <hr>
                    <button type='submit' class='btn btn-primary'>Simpan</button>
                    </div>
                  </form>

                </div>           
          		</div>
          	</div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
