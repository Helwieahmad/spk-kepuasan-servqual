<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$path_adm=base_url()."an-theme/admin";

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SPK Lab | Daftar</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo $path_adm; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome Icons -->
    <link href="<?php echo $path_adm; ?>/plugins/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo $path_adm; ?>/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="<?php echo base_url() ?>" target='_top'><span style=""><div class="text-orange">SPK LABKOM</div></span></a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Daftar Menjadi Tenant</p>
        <div class="row">
            <div class="col-xs-12">
              <?php echo $this->session->flashdata('verify_msg'); ?>
             <?php echo form_close(); ?>
        <?php echo $this->session->flashdata('msg'); ?>
        <?php $tgl=date("Y:m:d H:i:s",now());?>
            </div>
      </div>
        <?php $attributes = array("name" => "registrationform");
        echo form_open("tenant/register", $attributes);?>
          <div class="form-group has-feedback">
            <input type="number" placeholder="NPM / NIK / NIDN" class="form-control" required='required' name="npm" value="<?php echo set_value('npm'); ?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <span class="text-danger"><?php echo form_error('npm'); ?></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" placeholder="Nama Lengkap" class="form-control" required='required' name="nama_lengkap" value="<?php echo set_value('nama_lengkap'); ?>">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <span class="text-danger"><?php echo form_error('nama_lengkap'); ?></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" placeholder="Email" class="form-control" name="email" value="<?php echo set_value('email'); ?>">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <span class="text-danger"><?php echo form_error('email'); ?></span>
          </div>
          <div class="form-group has-feedback">
            <input placeholder="Password" class="form-control" type="password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <span class="text-danger"><?php echo form_error('password'); ?></span>
          </div>
          <div class="form-group has-feedback">
            <input placeholder="Konfirmasi password" class="form-control" name="cpassword" type="password">
            <input name="avatar_tenant" type="hidden" value="NoImage.jpg">
            <input name="prodi" type="hidden" value="0">
            <input name="level_tenant" type="hidden" value="3">
            <input type="hidden" name="tanggal_daftar" value="<?php echo date('Y-m-d'); ?>">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            <span class="text-danger"><?php echo form_error('cpassword'); ?></span>
          </div>
          <div class='form-group '>
                              <label for='status'>Status Sebagai</label>
                                <select name="status" id="status" class="form-control" required>
                                <option selected></option>
                                <?php
                                if($list_status!=false){
                                  echo $list_status;
                                }
                                 ?>
                              </select>
                          </div>
                       <!--- <div id="unit" style="display: none;">
                          <div class="form-group">
                            <label class="control-label">Unit</label>
                            <select class="form-control unit">
                              <option value="">--Pilih Unit--</option>
                            </select>
                          </div>
                        </div>
                        <div id="fakultas" style="display: none;">
                          <div class="form-group">
                            <label class="control-label">Fakultas</label>
                            <select class="form-control fakultas">
                              <option value="">--Pilih Fakultas--</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Prodi</label>
                            <select class="form-control prodi">
                              <option value="">--Pilih Prodi--</option>
                            </select>
                          </div>
                        </div> ------>
                        
          <div class="row">
            <div class="col-xs-4 col-xs-offset-8">
              <button class="btn btn-warning btn-block btn-flat" type="submit">Daftar</button>
            </div><!-- /.col -->
          </div>
        </form>


        <div class="social-auth-links text-center">
          <p>- Atau -</p>
        </div>

        <a class="text-center text-orange" href="<?php base_url() ?>login">Sudah Memiliki Akun? Silahkan Login! </a>
      </div><!-- /.form-box -->
    </div>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo $path_adm; ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo $path_adm; ?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

  </body>
</html>
<script type="text/javascript">
            $(document).ready(function(){
                $('#status').on('change', function() {
                  if ( this.value == '1')
                  {
                    $("#unit").show();
                    $("#fakultas").hide();
                  }
                  else
                  {
                    $("#unit").hide();
                    $("#fakultas").show();
                  }
                });
            });
            
            $( document ).ready(function() {
              showHide();
              $("#status").change(function () {
                showHide();
              });
            });
</script>