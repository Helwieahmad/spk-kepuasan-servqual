<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
?>

      <div class="content-wrapper" >
        <section class="content-header">
          <h1>
            Kotak Saran
            <small>Pengaturan Kotak Saran</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $burl; ?>/"><i class="fa fa-dashboard"></i> Halaman Utama</a></li><li class"active">Kotak Saran</li>          
          </ol>
        </section>

        <section class="content">
         <div class="box box-info">
          <div class="box-body">
          <table class="table table-bordered table-stripped table-kotak">
            <thead>
              <tr>
                <th>Nama</th>
                <th>EMail</th>
                <th>Tanggal</th>
                <th>Isi Saran</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>

<?php 
  $no=1;
  foreach ($kotaksaran AS $kotak) {
    $style=$kotak['dibaca']=="N"?"font-weight:bold":"";
    echo "<tr style='$style' data-id='$kotak[id]' >

            <td>$kotak[nama]</td>      
            <td>$kotak[email]</td>      
            <td>$kotak[tanggal]</td>      
            <td>".word_limiter($kotak['saran'],7)."...</td>      
            <td> 
            <i style='color:green;cursor:pointer' class='fa lihat-pesan fa-eye' data-id='$kotak[id]' ></i>  &nbsp;
            <i class='fa hapus-pesan fa-close hapus-icon' data-id='$kotak[id]' ></i> 

            </td>      

          </tr>
          ";
      $no++;
  }

 ?>

            </tbody>

          </table>
        </div>
      </div>
        </section>




<!-- Modal -->
<div class="modal fade" id="pesanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">


        <div class="box box-primary">
          <div class="overlay">
            <i class="fa fa-refresh fa-spin"></i>
          </div>
          <div class="box-header with-border">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Inbox</h4>
            </div>

          <div class="box-body">
            <div class="mailbox-read-info">
              <H3><span class='nama'></span></H3>
              <H5><i class='fa fa-envelope-o'></i> <span class='email'></span>

                <span class='mailbox-read-time pull-right tanggal'></span>

              </H5>
            </div>
            <div class="mailbox-read-message pesan">
              hai
            </div>
          </div>

          <div class="box-footer">

          <div class="pull-right">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
               <button type="button" class="btn btn-default tombol-hapus-pesan" data-id='' ><i class="fa fa-trash-o"></i> Hapus</button>
          </div>
                

          </div>

        </div>

  </div>
</div>
<!-- Modal -->
      </div>

