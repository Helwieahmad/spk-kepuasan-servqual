<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

       <!-- Main Footer -->
      <footer class="main-footer" style="background-color:#605ca8">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          
        </div>
        <!-- Default to the left -->
        <span style="color:#ffffff;"><center>SPK Analisa Kepuasan Pengunjung Laboratorium Komputer UNIKAMA 2017</center></span> 
      </footer>
      
      <div class='modal-error'></div>
      <div class='notif-proses'></div>
      <div class='modal-konfirmasi'></div>


      <div class="modal fade" id="modal-upload-foto" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header"> 
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4>Upload Foto</h4>
                      
                  </div>
                  <div class="modal-body">
                      <div class="area-pop-up-upload dropzone well dz-clickable"></div>
                      <div class="input-group">
                          <div class="input-group-addon">URL</div>
                          <input type='text' class='form-control just-upload-field' />
                      </div>
                  </div>
                  <div class="modal-footer">
                  </div>
              </div>
          </div>
 </div>


 <div class="modal fade" id="modal-direct-upload" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header"> 
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4>Upload Foto</h4>
                      
                  </div>
                  <div class="modal-body">

<iframe id="iframe-direct-upload" style="width: 100%" height="400" src="" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>

                  </div>
                  <div class="modal-footer">
                  </div>
              </div>
          </div>
 </div>

    </div><!-- ./wrapper -->
<!-- jQuery 2.1.4 -->
 <!--<script src="<?php path_adm() ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script> -->

 <script src="<?php path_adm() ?>/plugins/jQuery/jquery-1.12.0.min.js"></script> 
<script src="<?php path_adm() ?>/plugins/jquery-ui-1.11.4/jquery-ui.min.js"></script> 
<script src="<?php path_adm() ?>/plugins/jquery.ui.touch-punch.min.js"></script> 
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php path_adm() ?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php path_adm() ?>/dist/js/app.min.js" type="text/javascript"></script>
  <!-- DATATABLES -->
    <script src="<?php path_adm() ?>/plugins/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php path_adm() ?>/plugins/datatables/media/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php path_adm() ?>/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="<?php path_adm() ?>/plugins/datatables/extensions/Responsive/js/responsive.bootstrap.js" type="text/javascript"></script>
  <!-- DATATABLES -->
  <!--isotope-->
    <script src="<?php path_adm() ?>/plugins/isotope.pkgd.min.js" type="text/javascript"></script>
    <script src="<?php path_adm() ?>/plugins/imagesloaded.pkgd.min.js" type="text/javascript"></script>
  <!--isotope-->
     <script src="<?php path_adm() ?>/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
    <script src="<?php path_adm() ?>/plugins/chartJs/Chart.Bar.js" type="text/javascript"></script>
    <script src="<?php path_adm() ?>/dist/js/ando_admin.js" type="text/javascript"></script>
    <script src="<?php path_adm() ?>/dist/dropzone/dropzone.min.js" type="text/javascript"></script>
    <script src="<?php path_adm() ?>/dist/codemirror/lib/codemirror.js" type="text/javascript"></script>
    <script src="<?php path_adm() ?>/dist/codemirror/mode/javascript/javascript.js" type="text/javascript"></script>
    <script src="<?php path_adm() ?>/dist/codemirror/mode/css/css.js" type="text/javascript"></script>
   <script src="<?php path_adm() ?>/dist/js/mosaicflow.min.js" type="text/javascript"></script>
<?php
  echo '<script src="'.rpath_adm().'/dist/js/speakingurl.min.js" type="text/javascript"></script>';
  echo '<script src="'.rpath_adm().'/dist/tinymce/tinymce.min.js" type="text/javascript"></script>';
  ?>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->

      <!--Apa ini?? kenapa javascript nya gak buat dalam file sendiri/embed??
          Semua sintax di bawah ini adalah sintax sintax yang berurusan dengan Ajax,
          Sangat gak memungkinkan menaruhnya di file embed dikarenakan untuk mendefinisikan properti URL menggunakan fungsi PHP "base_url()" 
          Kalo ada yang bisa jurusnya,atau punya saran, plese let me know :)-->
        <script>
              $(document).ready(function() {
              //Preloader
              $(window).load(function() {
              preloaderFadeOutTime = 500;
              function hidePreloader() {
              var preloader = $('.spinner-wrapper-staff');
              preloader.fadeOut(preloaderFadeOutTime);
              }
              hidePreloader();
              });
              });
        </script>
        <script>
            setInterval(function(){
            $(".berkedip").toggle();
            },300);

        </script>
        <script type="text/javascript">
                Dropzone.autoDiscover = false;

                $(function(){


          $('[data-toggle="popover"]').popover();
          $('[data-toggle="tooltip"]').tooltip()

          modalUploadOn=false;

        //  $.material.init();

          
          $(".content-wrapper").prepend("<section class='koneksi'><div class='koneksi_stat'></div> </section>")

         var koneksi=true
         cek_koneksi(); 

          function cek_koneksi(){
            var target=$('.koneksi_stat');
            $.ajax({
              type:'POST',              
              url:'<?php echo base_url() ?>test_connection.php',
              cache:'false',
              timeout: 5000,
              success: function(a){               
                inter=setTimeout(cek_koneksi,15000);
                target.css({
                  "background-color":"",
                  "color":"green"
                }).html("<i class='fa fa-signal text-green'></i> <span class='berkedip'>Koneksi ke server Terhubung</span>");
                koneksi=true;

              },

              error: function(){

                if(koneksi){

                target.css({
                  "background-color":"red",
                  "color":"white"
                }).html(" <i class='fa fa-signal text-red'></i><span class='berkedip'> Koneksi ke server terputus</span>");
                koneksi=false;
                cek_koneksi();

                }
                else {
                   inter=setTimeout(cek_koneksi,3000);
               
                  target.css({
                  "background-color":"red",
                  "color":"white"
                }).html(" <i class='fa fa-signal text-red'></i> Koneksi terputus! Mencoba menghubungkan kembali...");
                  koneksi=false;
                 
                }

              }

            });
          }

          var foto_pop_up=new Dropzone(".area-pop-up-upload",{
            url:"<?php echo base_url() ?>An_ajax_staff/upload_pop_up",
            maxFilesize:2,
            maxFiles:1,
            method:"post",
            acceptedFiles:"image/*",
            paramName:"userfile",            
            dictDefaultMessage:"Drop foto/gambar disini",
            dictInvalidFileType:"Type file ini tidak dizinkan"
          });

          foto_pop_up.on("success",function(a,b){
            $(".just-upload-field").val("<?php echo base_url() ?>an-component/media/upload-gambar-pendukung/"+b).select();
          });



          $(".pop-up-upload").click(function(){
            $("#modal-upload-foto").modal();
          });


          $("#modal-upload-foto").on("hidden.bs.modal",function(){
              foto_pop_up.removeAllFiles(true);
              $(".just-upload-field").val("");
             });



          <?php if($npage=="1"){ ?>

          var pieData = [

            <?php 

              foreach ($data['admin'] as $admin) {
                echo "
                  {
                  value: '$admin[hasil]',
                  label: '$admin[name_user]'
                  },

                  ";
                  }

                 ?>

                ];

                var ctx = document.getElementById("chart-area").getContext("2d");
                window.myPie = new Chart(ctx).Pie(pieData);
          <?php } ?>

          <?php if($npage==2){
           ?>
           $(".slug-table").DataTable();
           $(document).on("click",".hapus-kuisioner",function(){
            if(!ajax_request){
            konfirmasi("Menghapus Data Kuisioner!","Anda yakin akan menghapus Data Kuisioner ini?",delete_kuisioner,$(this));    
              }   
           });
           function delete_kuisioner(_this){
            ajax_request=true;
            var id_kuisioner=_this.attr("id");
            show_proses("Menghapus Data Kuisioner...");
            $.ajax({
              type:"POST",
              url:"<?php echo base_url() ?>AN_ajax_admin/delete_kuisioner",
              data:{"id":id_kuisioner},
              cache:false,
              success:function(a){
                if(a=="ok"){
                  show_proses("Berhasil!. Sedang merefresh halaman...");
                  window.location.reload();
                } else {
                  error_alert("Error","Internal Error<br>Error"+a);
                  hide_proses();
                  ajax_request=false;
                }

              },
              error:function(a,b,c){
                error_alert("Error","Cek koneksi anda<br>Error:"+c);
                hide_proses();
                ajax_request=false;
              }
            });
           }
         <?php } ?>

         <?php if($npage==3){
           ?>           
       /* <?php
        if($kuisioner_kriteria!=false){
          echo "var kriteria_terpilih= [$kuisioner_kriteria];";
        } else {
          echo "var kriteria_terpilih= [];";
        } ?>

        $('span.span-kriteria').each(function(index){
          var _1this=$(this);
          var id1=_1this.attr('id');
          $.each(kriteria_terpilih,function(i,v){
            if(v==id1){
              _1this.attr({class:"btn btn-block btn-social btn-primary span-kriteria",title:"selected"});
              return false;
            }
          });
        });
        
        var kuisioner_kriteria;
        $(document).on("click",".span-kriteria",function(){
          var sta=$(this).attr("title");
          var id_t=Number($(this).attr("id"));
          if(sta=="not_select"){
            $(this).attr({class:"btn btn-block btn-social btn-primary span-kriteria",title:"selected"});
            kuisioner_kriteria=kriteria_terpilih.push(id_t);
          } else if (sta=="selected"){      
            $(this).attr({class:"btn btn-block btn-social btn-github span-kriteria",title:"not_select"});
            $.each(kriteria_terpilih,function(i,v){
              if(v==id_t){
                kuisioner_kriteria=kriteria_terpilih.splice(i,1);
                return false;
              }
            });
          }
          $(".area_count").html(kriteria_terpilih.length);
         
        });

        $(".area_count").html(kriteria_terpilih.length); */
  
           $(document).on("click","#simpan-kuisioner",function(){
              if(!ajax_request){
                ajax_request=true;
              var id_kuisioner=$("#id_kuisioner").val();
              var periode=$("#periode").val();
              var tahun=$("#tahun").val();
              var aktif=$("#aktif").val();
              var deskripsi=$("#deskripsi").val();
              
              show_proses("Menyimpan Data Kuisioner...");
              $.ajax({
              type:"POST",
              url:"<?php echo base_url() ?>AN_ajax_admin/kuisioner",
              data:{"id_kuisioner":id_kuisioner,"periode":periode,"tahun":tahun,"aktif":aktif,"deskripsi":deskripsi},
              cache:false,
              success:function(a){
                if(a=="ok"){
                  show_proses("Berhasil!. Sedang merefresh halaman...");
                  window.location="<?php echo base_url(); ?>staff/all_kuisioner";
                } else{
                  if(/^[\d]+$/.test(a)){
                    window.location.assign("<?php echo base_url(); ?>staff/kuisioner/"+a);

                  } else {
                    error_alert("Error","Terjadi kesalahan internal<br>Error:"+a);
                    hide_proses();
                    ajax_request=false;
                  }
                }

              },
              error:function(a,b,c){
                error_alert("Error","Terjadi kesalahan, cek koneksi anda<br> Error:"+c);
                ajax_request=false;
                hide_proses();
              }
            });
              }
            });
           <?php } ?> 

         <?php if($npage==4){
           ?>
           $(".slug-table").DataTable();
           $(document).on("click",".hapus-kriteria",function(){
            if(!ajax_request){
            konfirmasi("Menghapus Kriteria!","Anda yakin akan menghapus Data Kriteria ini?",delete_kriteria,$(this));    
              }   
           });
           function delete_kriteria(_this){
            ajax_request=true;
            var id_kriteria=_this.attr("id");
            show_proses("Menghapus Data Kriteria...");
            $.ajax({
              type:"POST",
              url:"<?php echo base_url() ?>An_ajax_staff/delete_kriteria",
              data:{"id":id_kriteria},
              cache:false,
              success:function(a){
                if(a=="ok"){
                  show_proses("Berhasil!. Sedang merefresh halaman...");
                  window.location.reload();
                } else {
                  error_alert("Error","Internal Error<br>Error"+a);
                  hide_proses();
                  ajax_request=false;
                }

              },
              error:function(a,b,c){
                error_alert("Error","Cek koneksi anda<br>Error:"+c);
                hide_proses();
                ajax_request=false;
              }
            });
           }
         <?php } ?>

         <?php if($npage==5){
           ?>           
            $(document).on("click","#simpan-kriteria",function(){
              if(!ajax_request){
                ajax_request=true;
              var id_kriteria=$("#id_kriteria").val();
              var kriteria=$("#kriteria").val();
              var id_dimensi=$("#id_dimensi").val();
              var aktif=$("#aktif").val();
              var keterangan=$("#keterangan").val();
           
              show_proses("Menyimpan Data Kriteria...");
              $.ajax({
              type:"POST",
              url:"<?php echo base_url() ?>AN_ajax_staff/kriteria",
              data:{"id_kriteria":id_kriteria,"kriteria":kriteria,"id_dimensi":id_dimensi,"aktif":aktif,"keterangan":keterangan},
              cache:false,
              success:function(a){
                if(a=="ok"){
                  show_proses("Berhasil!. Sedang merefresh halaman...");
                  window.location="<?php echo base_url(); ?>staff/all_kriteria";
                } else{
                  if(/^[\d]+$/.test(a)){
                    window.location.assign("<?php echo base_url(); ?>staff/kriteria/"+a);

                  } else {
                    error_alert("Error","Terjadi kesalahan internal<br>Error:"+a);
                    hide_proses();
                    ajax_request=false;
                  }
                }

              },
              error:function(a,b,c){
                error_alert("Error","Terjadi kesalahan, cek koneksi anda<br> Error:"+c);
                ajax_request=false;
                hide_proses();
              }
            });
              }
            });
           <?php } ?> 
          
         <?php if($npage==6){
           ?>
           $(".slug-table").DataTable();
           $(document).on("click",".hapus-dimensi",function(){
            if(!ajax_request){
            konfirmasi("Menghapus Dimensi!","Anda yakin akan menghapus Data Dimensi ini?",delete_dimensi,$(this));    
              }   
           });
           function delete_dimensi(_this){
            ajax_request=true;
            var id_dimensi=_this.attr("id");
            show_proses("Menghapus Data Dimensi...");
            $.ajax({
              type:"POST",
              url:"<?php echo base_url() ?>An_ajax_staff/delete_dimensi",
              data:{"id":id_dimensi},
              cache:false,
              success:function(a){
                if(a=="ok"){
                  show_proses("Berhasil!. Sedang merefresh halaman...");
                  window.location.reload();
                } else {
                  error_alert("Error","Internal Error<br>Error"+a);
                  hide_proses();
                  ajax_request=false;
                }

              },
              error:function(a,b,c){
                error_alert("Error","Cek koneksi anda<br>Error:"+c);
                hide_proses();
                ajax_request=false;
              }
            });
           }
         <?php } ?>

         <?php if($npage==7){
           ?>           
            $(document).on("click","#simpan-dimensi",function(){
              if(!ajax_request){
                ajax_request=true;
              var id_dimensi=$("#id_dimensi").val();
              var dimensi=$("#dimensi").val();
              var keterangan=$("#keterangan").val();
           
              show_proses("Menyimpan Data Dimensi...");
              $.ajax({
              type:"POST",
              url:"<?php echo base_url() ?>An_ajax_staff/dimensi",
              data:{"id_dimensi":id_dimensi,"dimensi":dimensi,"keterangan":keterangan},
              cache:false,
              success:function(a){
                if(a=="ok"){
                  show_proses("Berhasil!. Sedang merefresh halaman...");
                  window.location="<?php echo base_url(); ?>staff/all_dimensi";
                } else{
                  if(/^[\d]+$/.test(a)){
                    window.location.assign("<?php echo base_url(); ?>staff/dimensi/"+a);

                  } else {
                    error_alert("Error","Terjadi kesalahan internal<br>Error:"+a);
                    hide_proses();
                    ajax_request=false;
                  }
                }

              },
              error:function(a,b,c){
                error_alert("Error","Terjadi kesalahan, cek koneksi anda<br> Error:"+c);
                ajax_request=false;
                hide_proses();
              }
            });
              }
            });
           <?php } ?> 

          <?php if($npage==8){
           ?>
           $('.tenant-table').DataTable();
            var main_foto=false;
            var foto_box= new Dropzone("#modal-foto .area-foto",{ url: "<?php echo base_url() ?>An_ajax_staff/update_avatar_tenant",
                                                      maxFilesize: 2,
                                                      maxFiles: 1,
                                                      method:'post',
                                                      acceptedFiles:"image/*",
                                                      paramName:"userfile",
                                                      addRemoveLinks: true,
                                                      dictDefaultMessage:"Drop foto/gambar disini untuk dijadikan pengganti gambar profil Tenant<br> (160px x 160px)",
                                                      dictInvalidFileType:"Type file ini tidak dizinkan",
                                                      dictRemoveFile:"Batalkan gambar ini"
                                                    });


           function showOk(){
            $("#modal-foto button.ok").show();
            $("#modal-foto button.fakeOk").hide();
           }

           function hideOk(){
            $("#modal-foto button.ok").hide();
            $("#modal-foto button.fakeOk").show();
           }

           foto_box.on("sending",function(a,b,c){
            var id_=$("#modal-foto input.id_tenant").val();
            a.token=Math.random();
            c.append('token_foto',a.token);
            c.append('id_tenant',id_);
           });
           foto_box.on("success",function(a,b,c){
            if(b!="ok"){
            console.log("Upload Error dari server: "+b);
              alert("Upload Error: "+b);
              main_foto=false;
              hideOk()
            } else {
              main_foto=true;
            console.log("Upload Berhasil");
            showOk();
          }
           });
           foto_box.on("error",function(a,b,c){
            if(!main_foto){
              hideOk()
            }
            console.log("errorMessage: "+b);
            console.log("XMLHttpRequest error : "+c);
           });
           foto_box.on("removedfile",function(a,b,c){
           
            if(a.status=="success"){
              var _token=a.token;
              $.ajax({
                type:"POST",
                url:"<?php echo base_url() ?>An_ajax_staff/delete_foto_temp",
                data:{foto_token:_token},
                cache:false,
                success:function(){
                  hideOk();
                  main_foto=false;
                },
                error: function(){ 
                  hideOk();
                  main_foto=false;
                }

              });
            }
          })
           foto_box.on("complete",function(a){
            console.log("Complete: "+a);
           })

            $(document).on("click","table.tenant-table a.foto",function(){
              if(!ajax_request){
              var id=$(this).parent().parent().attr("id");
              var nama_lengkap=$(this).parent().siblings().find("span.nama_lengkap").html();
              $("#modal-foto span.nama_lengkap").html(nama_lengkap);
              $("#modal-foto input.id_tenant").val(id);
             $("#modal-foto").modal(); 
             }
            });

            $(document).on("click","#modal-foto button.ok",function(){
             var __id=$("#modal-foto input.id_tenant").val();
             $.ajax({
              type:"POST",
              url:"<?php echo base_url() ?>An_ajax_staff/ganti_avatar_tenant",
              data:{id_tenant:__id},
              cache:false,
              success:function(a,b,c){
                if(a=="ok"){
                console.log("Foto Berhasil Diganti: "+a);
               } else {
                console.log("Foto GAGAL Diganti. Error: "+a);

               } 
              }, 
              error:function (a,b,c){
                 console.log("Terjadi error. Error: "+a);
                 console.log("Terjadi error. Error: "+b);
                 console.log("Terjadi error. Error: "+c);
              }

             });
              $("#modal-foto").modal("hide");
            });

             $("#modal-foto").on("hidden.bs.modal",function(){
              foto_box.removeAllFiles(true);
              main_foto=false;
              hideOk();

             });
        /*---akhir foto tenan---*/

           $(document).on("click",".hapus-tenant",function(){
            if(!ajax_request){
            konfirmasi("Menghapus Data Tenant!","Anda yakin akan menghapus Data Tenant ini?",delete_tenant,$(this));    
              }   
           });
           function delete_tenant(_this){
            ajax_request=true;
            var id_tenant=_this.attr("id");
            show_proses("Menghapus Data Tenant...");
            $.ajax({
              type:"POST",
              url:"<?php echo base_url() ?>An_ajax_staff/delete_tenant",
              data:{"id":id_tenant},
              cache:false,
              success:function(a){
                if(a=="ok"){
                  show_proses("Berhasil!. Sedang merefresh halaman...");
                  window.location.reload();
                } else {
                  error_alert("Error","Internal Error<br>Error"+a);
                  hide_proses();
                  ajax_request=false;
                }

              },
              error:function(a,b,c){
                error_alert("Error","Cek koneksi anda<br>Error:"+c);
                hide_proses();
                ajax_request=false;
              }
            });
           }
         <?php } ?>  


/*------ awal edit tenant ---*/

           <?php if($npage==35){ ?>           
           /* Untuk mencek inputan npm*/
        var valid_password=false,
            valid_repassword=false,
            valid_full_name=false,
            valid_email=false

      $(".form-edit-tenant input#password").on("blur keyup",function(e){
        if(e.type='keyup'){
          $(".form-edit-tenant input#repassword").val('').siblings('.form-control-feedback').attr('class','form-control-feedback');
           valid_repassword=false;
        }
        var passvall=$(this).val();
        var yy=$(this);
        if(passvall!=''){
          if(passvall.length>=5){
            yy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
           yy.parent().siblings('span.label-danger').html('');
           valid_password=true;

          }else{
            yy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           yy.parent().siblings('span.label-danger').html('Minimal 5 karakter');
           valid_password=false;
          }
        } else {
          yy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           yy.parent().siblings('span.label-danger').html('Tidak boleh kosong');
           valid_password=false;
        }
      });
      
      $(".form-edit-tenant input#repassword").on("blur keyup",function(e){
        var repass=$(this).val();
        var yyy=$(this);
        var passbef=$(".form-edit-tenant input#password").val();
        
        if(repass==passbef){
           yyy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
           yyy.parent().siblings('span.label-danger').html('');
           valid_repassword=true;
        } else {
           yyy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           yyy.parent().siblings('span.label-danger').html('Password tidak sama');
           valid_repassword=false;
        }

      });

       $(".form-edit-tenant input#nama_lengkap").on("blur keyup",function(){
        var namavall=$(this).val();
        var zz=$(this);
        if(namavall!=''){
          if(/^\w[\w\s]+$/.test(namavall)){
            zz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
           zz.parent().siblings('span.label-danger').html('');
           valid_full_name=true;
          } else {
            zz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           zz.parent().siblings('span.label-danger').html('Hanya diperbolehkan huruf/angka/underscore/spasi. Dan jg ada spasi di awal');
           valid_full_name=false;
          }
        } else {
           zz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           zz.parent().siblings('span.label-danger').html('Tidak boleh kosong');
           valid_full_name=false;
        }
      });

      /*email*/
      $(".form-edit-tenant input#email").on("blur keyup",function(){
        var mailval=$(this).val();
        var z=$(this);
        if(/^[\w-.]+@[0-9a-zA-Z_.]+\.[0-9a-zA-Z_.]+$/.test(mailval)){
           z.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
           z.parent().siblings('span.label-danger').html("");
           valid_email=true;
                 
                }
         else {
           z.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           z.parent().siblings('span.label-danger').html('Format email tidak benar');
           valid_email=false;
        }
      });

      var form_no_error=false;
      function cek_no_error(){
        if(valid_password && valid_repassword && valid_full_name && valid_email){
          form_no_error=true;
        }else{
          form_no_error=false;
        }
      }
      setInterval(cek_no_error,500);
      
            $('.form-edit-tenant').submit(function(e){
                e.preventDefault();
                if(!ajax_request){
                  if(form_no_error){
                     proses_edit_tenant($(this));   
                 }else {
                  error_alert("Form belum terisi dengan benar","Masih ada input yang belum terisi dengan benar. Pastikan semua input sudah tercentang hijau");
                 }
               }
              });

            function proses_edit_tenant(_this){
              if(!ajax_request){
                ajax_request=true;
                show_proses("Memperbaharui Data Tenant...");
                var id_tenant=_this.find("input#id_tenant").val(),
                  npm=_this.find("input#npm").val(),
                  password=_this.find("input#password").val(),
                  repassword=_this.find("input#repassword").val(),
                  nama_lengkap=_this.find("input#nama_lengkap").val(),
                  email=_this.find("input#email").val(),
                  status=_this.find("select#status").val();
                  unit=_this.find("select.unit").val(),
                  prodi=_this.find("select.prodi").val()

                $.ajax({
                  type:"POST",
                  url:"<?php echo base_url() ?>An_ajax_staff/edit_tenant",
                  data:{"id_tenant":id_tenant,"npm":npm,"password":password,"repassword":repassword,"nama_lengkap":nama_lengkap,"email":email,"status":status,"unit":unit,"prodi":prodi},
                  cache:false,
                  success:function(a){
                    if(a=="ok"){
                      hide_proses();
                   show_proses("Berhasil!, mengalihkan halaman...")
                    window.location="<?php echo base_url() ?>staff/all_tenant";
                     //error_alert("berhasil",a);
                    } else if(a=='taken'){
                      error_alert("Sistem Menolak!","No Induk yang anda masukan sudah pernah terdaftar! Silahkan forgot password atau hubungi Administrator");
                      ajax_request=false;
                    } else {
                      error_alert("Error","Maaf ada kesalahan tidak terduga. Mohon coba lagi<br> Pesan Error: <br>"+a);
                      ajax_request=false;
                    }
                    hide_proses();
                  },
                  error:function(a,b,c){                    
                      error_alert("Error","Terjadi kesalahan. Mungkin koneksi internet terputus atau server down. Mohon coba lagi<br> Pesan Error: <br>"+c);
                      hide_proses();
                      ajax_request=false;
                  }
                });
              }
            }
          
          <?php  } //Akhir untuk form tenant baru?>

            /*---Akhir Edit Tenant---*/

        <?php  if($npage=="9"){ ?>
         /*From menambah npm*/

        /* Untuk mencek inputan npm*/
        var valid_npm=false,
            valid_password=false,
            valid_repassword=false,
            valid_full_name=false,
            valid_email=false

        /*npm*/
        $(".form-tenant-baru input#npm").blur(function(){
          var userval=$(this).val();
          var p=$(this);
          if(userval!=''){
            if(/^[\w]+$/.test(userval)){
            if(userval.length>4){
            $.ajax({
              type:"POST",
              url:"<?php echo base_url() ?>AN_ajax_staff/cek_npm",
              data:{npm:userval},
              cache:false,
              success:function(a){
                if(a=='ok' && userval.length>4){
                 p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
                  p.parent().siblings('span.label-danger').html("");
                  valid_npm=true;
                 
                }
                else if(a=='terpakai') {
                   p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                   p.parent().siblings('span.label-danger').html('Nomor Induk yang Anda Masukkan sudah Terdaftar');
                   valid_npm=false;
                }
              }
            });
            }
            else {
                   p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                   p.parent().siblings('span.label-danger').html('Harus minimal 5 karakter');
                   valid_npm=false;
            }
          }
          else {
                   p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                   p.parent().siblings('span.label-danger').html('Hanya Karakter Angka yang diperbolehkan dan jangan ada spasi');
                   valid_npm=false;
          }
          }else{
             p.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
                   p.parent().siblings('span.label-danger').html('hanya Karakter Angka yang diperbolehkan, jangan ada spasi dan Tidak boleh kosong');
                   valid_npm=false;
          }
        })

      $(".form-tenant-baru input#password").on("blur keyup",function(e){
        if(e.type='keyup'){
          $(".form-tenant-baru input#repassword").val('').siblings('.form-control-feedback').attr('class','form-control-feedback');
           valid_repassword=false;
        }
        var passvall=$(this).val();
        var yy=$(this);
        if(passvall!=''){
          if(passvall.length>=5){
            yy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
           yy.parent().siblings('span.label-danger').html('');
           valid_password=true;

          }else{
            yy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           yy.parent().siblings('span.label-danger').html('Minimal 5 karakter');
           valid_password=false;
          }
        } else {
          yy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           yy.parent().siblings('span.label-danger').html('Tidak boleh kosong');
           valid_password=false;
        }
      });
      
      $(".form-tenant-baru input#repassword").on("blur keyup",function(e){
        var repass=$(this).val();
        var yyy=$(this);
        var passbef=$(".form-tenant-baru input#password").val();
        
        if(repass==passbef){
           yyy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
           yyy.parent().siblings('span.label-danger').html('');
           valid_repassword=true;
        } else {
           yyy.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           yyy.parent().siblings('span.label-danger').html('Password tidak sama');
           valid_repassword=false;
        }

      });

 $(".form-tenant-baru input#nama_lengkap").on("blur keyup",function(){
        var namavall=$(this).val();
        var zz=$(this);
        if(namavall!=''){
          if(/^\w[\w\s]+$/.test(namavall)){
            zz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
           zz.parent().siblings('span.label-danger').html('');
           valid_full_name=true;
          } else {
            zz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           zz.parent().siblings('span.label-danger').html('Hanya diperbolehkan huruf/angka/underscore/spasi. Dan jg ada spasi di awal');
           valid_full_name=false;
          }
        } else {
           zz.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           zz.parent().siblings('span.label-danger').html('Tidak boleh kosong');
           valid_full_name=false;
        }
      });

      /*email*/
      $(".form-tenant-baru input#email").on("blur keyup",function(){
        var mailval=$(this).val();
        var z=$(this);
        if(/^[\w-.]+@[0-9a-zA-Z_.]+\.[0-9a-zA-Z_.]+$/.test(mailval)){
           z.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-ok form-control-feedback feed-success');
           z.parent().siblings('span.label-danger').html("");
           valid_email=true;
                 
                }
         else {
           z.siblings('.form-control-feedback').attr('class','glyphicon glyphicon-remove form-control-feedback feed-error');
           z.parent().siblings('span.label-danger').html('Format email tidak benar');
           valid_email=false;
        }
      });

      var form_no_error=false;
      function cek_no_error(){
        if(valid_npm && valid_password && valid_repassword && valid_full_name && valid_email){
          form_no_error=true;
        }else{
          form_no_error=false;
        }
      }
      setInterval(cek_no_error,500);
      
          /* Untuk upload avatar admin */
           var sedang_upload_avatar=false;
           var avatar_terupload=false;
           var form_username_has_error=false;
           var file_temp_telah_terhapus=false;
           var sesi=$('.sesi-from').val();
           var AvatarBaru=new Dropzone(".avatar_tenant", { url: "<?php echo base_url() ?>AN_ajax_staff/avatar_tenant" ,
                                                      maxFilesize: 2,
                                                      maxFiles: 1,
                                                      method:'post',
                                                      acceptedFiles:"image/*",
                                                      paramName:"userfile",
                                                      addRemoveLinks: true,
                                                      headers: {sesi:"2"},
                                                      dictDefaultMessage:"Drop foto/gambar disini untuk dijadikan gambar profil user <br> (160px x 160px)",
                                                      dictInvalidFileType:"Type file ini tidak dizinkan",
                                                      dictRemoveFile:"Batalkan gambar ini"
                                                    });
           AvatarBaru.on("sending",function(a,b,c){
            a.token=Math.random();
            c.append('sesi',sesi);
            c.append('token_foto',a.token);
            sedang_upload_avatar=true;
           
            console.log('mengirim');
            console.log('sedang_upload_avatar:'+sedang_upload_avatar);
           })
           AvatarBaru.on("success",function(a,b,c){
            sedang_upload_avatar=false;
            avatar_terupload=true;
            file_temp_telah_terhapus=false;
            console.log('success');
            console.log('sedang_upload_avatar:'+sedang_upload_avatar);
            console.log('avatar_terupload:'+avatar_terupload);
            console.log(a.token);
           // alert(b)
           })
           AvatarBaru.on("error",function(a,b){ 
            sedang_upload_avatar=false;
            avatar_terupload=(avatar_terupload)?true:avatar_terupload;
            console.log('error');
            console.log('sedang_upload_avatar:'+sedang_upload_avatar);
            console.log('avatar_terupload:'+avatar_terupload);
           })

           AvatarBaru.on("canceled",function(){
            sedang_upload_avatar=false;
             avatar_terupload=false;
           })

           AvatarBaru.on("removedfile",function(a){
            if(a.status=='success'){
              avatar_terupload=false;
              var token=a.token;
              $.ajax({
                type:"POST",
                url:"<?php echo base_url() ?>AN_ajax_staff/delete_foto_temp",
                data:{foto_token:token},
                cache:false,
                success:function(){
                  file_temp_telah_terhapus=true;
                }

              })

            }
            console.log(avatar_terupload);
           
           })


            $('.form-tenant-baru').submit(function(e){
                e.preventDefault();
                if(!ajax_request){
                if(form_no_error){
                    if(sedang_upload_avatar){
                      konfirmasi("Upload foto masih sementara barlangsung","Dengan mengklik tombol lanjutkan,Proses penyimpanan akan berlangsung tapi upload foto akan dibatalkan",proses_new_tenant,$(this));
                    } else {
                      if(!avatar_terupload){
                        //avatar tidak terupload
                        konfirmasi("Tidak ada foto yang diupload","Dengan mengklik tombol lanjutkan, data akan disimpan tanpa foto",proses_new_tenant,$(this));
                      } else {
                        //avatar terupload
                        proses_new_tenant($(this));
                      }
                    }
                 }
                 else {
                  error_alert("Form belum terisi dengan benar","Masih ada input yang belum terisi dengan benar. Pastikan semua input sudah tercentang hijau");
                 }
               }
              });

            function proses_new_tenant(_this){
              if(!ajax_request){
                ajax_request=true;
                show_proses("Menambahkan Tenant baru...");
                var npm=_this.find("input#npm").val(),
                  password=_this.find("input#password").val(),
                  repassword=_this.find("input#repassword").val(),
                  nama_lengkap=_this.find("input#nama_lengkap").val(),
                  email=_this.find("input#email").val(),
                  status=_this.find("select#status").val();
                  unit=_this.find("select.unit").val();
                  prodi=_this.find("select.prodi").val();
                  sessi=_this.find("input.sesi-from").val();
                  avatar_tenant=(avatar_terupload==true)?"1":"0";

                $.ajax({
                  type:"POST",
                  url:"<?php echo base_url() ?>AN_ajax_staff/new_tenant",
                  data:{"npm":npm,"password":password,"repassword":repassword,"nama_lengkap":nama_lengkap,"email":email,"status":status,"unit":unit,"prodi":prodi,"sessi":sessi,"avatar_tenant":avatar_tenant},
                  cache:false,
                  success:function(a){
                    if(a=="ok"){
                      hide_proses();
                   show_proses("Berhasil!, mengalihkan halaman...")
                    window.location="<?php echo base_url() ?>staff/all_tenant";
                     //error_alert("berhasil",a);
                    } else if(a=='taken'){
                      error_alert("Sistem Menolak!","No Induk yang anda masukan sudah pernah terdaftar! Silahkan forgot password atau hubungi Administrator");
                      ajax_request=false;
                    } else {
                      error_alert("Error","Maaf ada kesalahan tidak terduga. Mohon coba lagi<br> Pesan Error: <br>"+a);
                      ajax_request=false;
                    }
                    hide_proses();
                  },
                  error:function(a,b,c){                    
                      error_alert("Error","Terjadi kesalahan. Mungkin koneksi internet terputus atau server down. Mohon coba lagi<br> Pesan Error: <br>"+c);
                      hide_proses();
                      ajax_request=false;
                  }
                });
              }
            }

          <?php  } //Akhir untuk form tenant baru?>

          <?php  if($npage==10){ ?>

              $(".table-kotak").DataTable({
              aaSorting:[]
             })

              $(document).on("click",".lihat-pesan",function(){
                var _this=$(this);
                var id=_this.attr("data-id");
                var modal=$("#pesanModal");
                modal.find(".nama,.email,.tanggal,.saran").html("");
                modal.find(".overlay").show();
                modal.modal("show");
                $.ajax({
                  type:"POST",
                  data:{id:id},
                  url:"<?php echo base_url('AN_ajax_staff/baca_inbox'); ?>",
                  cache:false,
                  dataType:"json",
                  success: function(a){
                    modal.find(".overlay").hide();
                    modal.find(".nama").html(a.nama);
                    modal.find(".email").html(a.email);
                    modal.find(".tanggal").html(a.tanggal);
                    modal.find(".saran").html(a.pesan);
                    modal.find(".tombol-hapus-pesan").attr("data-id",a.id);
                    $(".table-kotak").find("tr[data-id='"+a.id+"']").css("font-weight","normal");
                  },
                  error: function(a,b,c){
                    error_alert("Error","Terjadi Kesalahan! Harap cek console");
                            console.log("ERROR (OUTPUT/RESPONSE SERVER): "+a.responseText);
                            console.log("ERROR: "+b);
                            console.log("ERROR: "+c);
                     modal.modal("hide");
                  },
                  complete: function(){
                  }
                });
              });

              $(document).on("click",".hapus-pesan,.tombol-hapus-pesan",function(){
                    var id=$(this).attr("data-id");
                    konfirmasi("Hapus Pesan","Yakin akan menghapus pesan ini?",hapus_pesan,id);
              });

               function hapus_pesan(id){
              ajax_request=true;
              show_proses("Menghapus Data Pesan");
              $.ajax({
                type:"POST",
                data:{"id":id},
                url:"<?php echo base_url() ?>AN_ajax_staff/hapus_pesan",
                cache:false,
                success:function(a){
                  if(a=="ok"){                    
                        show_proses("Berhasil Menghapus! Sedang Merefresh halaman");
                        window.location.reload();
                  } else {
                        error_alert("Error tidak terduga","Pesan error:<br>"+a);
                        ajax_request=false;
                        hide_proses();
                  }
                },
                error:function(a,b,c){
                        error_alert("Cek koneksi anda","Pesan error:<br>"+c);
                        ajax_request=false;
                        hide_proses();
                }
              });
              }

           <?php } ?>  

            <?php if($npage==11){ ?>

            $(".slug-table").DataTable();

            $("#nama_status").keyup(function(){
              var status=$(this).val();
              });

            $(".tambah-status-btn").click(function(){   
            if(!ajax_request) { 
            ajax_request=true;          
              var _status=$("#nama_status").val();
              if(!/^\w[a-zA-Z0-9 -]{2,50}$/.test(_status)){
                error_alert("Ilegal karakter","1. Jangan gunakan spasi di awal<br> 2. Karakter minimal 3 karakter, Max 50<br> 3. Karakter yang dijinkan hanyalah huruf, angka,underscore,garis datar dan spasi<br> 4. Field harus diisi tidak boleh kosong");
                ajax_request=false;
              } else{
                var _data={"nama_status":_status};
                  show_proses("Menambahkan Data status...");
                  $.ajax({
                    type: "POST",
                    url:"<?php echo base_url() ?>AN_ajax_staff/new_status",
                    data:_data,
                    cache:false,
                    success:function(a){
                      if(a=="ok"){
                        show_proses("Berhasil! Merefresh halaman");
                        window.location.reload();
                      }else{
                        error_alert("Error tidak terduga","Pesan error:<br>"+a);
                        ajax_request=false;
                        hide_proses();
                      }
                    },
                    error:function(a,b,c){
                        error_alert("Cek koneksi anda","Pesan error:<br>"+c);
                        ajax_request=false;
                        hide_proses();
                    }
                  });
              }
            }
            });

            var _dataObj={};

            $(document).on("click",".slug-table span",function(){
              var _this=$(this);
              var nilai=_this.html();
              _this.hide();
              _this.siblings("form").children("input").val(nilai).fadeIn();

            });

            $(document).on("keyup",".slug-table .nama_status input",function(){
              var nil1=$(this).val();
            });

            $(document).on("submit",".slug-table form",function(e){
              e.preventDefault();
              if(!ajax_request){
                ajax_request=true;
              __this=$(this);
              var id_status=__this.parent().parent().attr("id_status");
              var val=__this.find("input").val();
              var modul=__this.parent().attr("class");
              var cek_patern=(modul=="nama_status")?/^\w[a-zA-Z0-9 -]{2,20}$/:/^\w[\w-]{2,50}$/;

              _dataObj={"id_status":id_status,"value":val};
              _dataObj.modul=(modul=="nama_status")?"nama_status":"";

              if(modul=="nama_status"){
                if(!cek_patern.test(val)){
                   error_alert("Ilegal karakter","1. Jangan gunakan spasi di awal<br> 2. Karakter minimal 3 karakter, Max 20<br> 3. Karakter yang dijinkan hanyalah huruf, angka,underscore,garis datar dan spasi<br> 4. Field harus diisi tidak boleh kosong");
                   ajax_request=false;
                } else {
                  eksekusi(val);
                }
              } 
            }

            });

              function eksekusi(__val){
                _dataObj.value=__val;
                show_proses("Mengubah status");
                $.ajax({
                  type:"POST",
                  url:"<?php echo base_url() ?>AN_ajax_staff/edit_statusss",
                  data:_dataObj,
                  cache:false,
                  success: function(a){
                    if(a=="ok"){
                      __this.find("input").hide();
                      __this.siblings("span").html(_dataObj.value).fadeIn();
                    } else {
                      error_alert("Error tidak terduga","Pesan Error: <br>"+a);
                     
                    }
                    ajax_request=false;
                    hide_proses();
                  },
                  error: function(a,b,c){
                    error_alert("Error","Periksa koneksi anda. <br> Pesan error:<br>"+c);
                    ajax_request=false;
                    hide_proses();
                  }
                });
              }

            $(document).on("click",".slug-table .hapus_status button",function(){
              if(!ajax_request){
              var id=$(this).parent().parent().attr("id_status");
              konfirmasi("Hapus Data Status","Anda yakin akan menghapus Data Status ini?",hapus_status,id);
             }
            });

            function hapus_status(id){
              ajax_request=true;
              show_proses("Menghapus Data status");
              $.ajax({
                type:"POST",
                data:{"id_status":id},
                url:"<?php echo base_url() ?>AN_ajax_staff/hapus_status",
                cache:false,
                success:function(a){
                  if(a=="ok"){                    
                        show_proses("Berhasil Menghapus! Sedang Merefresh halaman");
                        window.location.reload();
                  } else {
                        error_alert("Error tidak terduga","Pesan error:<br>"+a);
                        ajax_request=false;
                        hide_proses();
                  }
                },
                error:function(a,b,c){
                        error_alert("Cek koneksi anda","Pesan error:<br>"+c);
                        ajax_request=false;
                        hide_proses();
                }
              });
            }
            <?php } ?>

            <?php if($npage==12){
            ?>

            $(".slug-table").DataTable();

            $("#nama_fakultas").keyup(function(){
              var fakultas=$(this).val();
              });

            $(".tambah-fakultas-btn").click(function(){   
            if(!ajax_request) { 
            ajax_request=true;          
              var _fakultas=$("#nama_fakultas").val();
              if(!/^\w[a-zA-Z0-9 -]{2,50}$/.test(_fakultas)){
                error_alert("Ilegal karakter","1. Jangan gunakan spasi di awal<br> 2. Karakter minimal 3 karakter, Max 50<br> 3. Karakter yang dijinkan hanyalah huruf, angka,underscore,garis datar dan spasi<br> 4. Field harus diisi tidak boleh kosong");
                ajax_request=false;
              } else{
                var _data={"nama_fakultas":_fakultas};
                  show_proses("Menambahkan Data Fakultas...");
                  $.ajax({
                    type: "POST",
                    url:"<?php echo base_url() ?>AN_ajax_staff/new_fakultas",
                    data:_data,
                    cache:false,
                    success:function(a){
                      if(a=="ok"){
                        show_proses("Berhasil! Merefresh halaman");
                        window.location.reload();
                      }else{
                        error_alert("Error tidak terduga","Pesan error:<br>"+a);
                        ajax_request=false;
                        hide_proses();
                      }
                    },
                    error:function(a,b,c){
                        error_alert("Cek koneksi anda","Pesan error:<br>"+c);
                        ajax_request=false;
                        hide_proses();
                    }
                  });
              }
            }
            });

            var _dataObj={};

            $(document).on("click",".slug-table span",function(){
              var _this=$(this);
              var nilai=_this.html();
              _this.hide();
              _this.siblings("form").children("input").val(nilai).fadeIn();

            });

            $(document).on("keyup",".slug-table .nama_fakultas input",function(){
              var nil1=$(this).val();
            });

            $(document).on("submit",".slug-table form",function(e){
              e.preventDefault();
              if(!ajax_request){
                ajax_request=true;
              __this=$(this);
              var id_fakultas=__this.parent().parent().attr("id_fakultas");
              var val=__this.find("input").val();
              var modul=__this.parent().attr("class");
              var cek_patern=(modul=="nama_fakultas")?/^\w[a-zA-Z0-9 -]{2,20}$/:/^\w[\w-]{2,50}$/;

              _dataObj={"id_fakultas":id_fakultas,"value":val};
              _dataObj.modul=(modul=="nama_fakultas")?"nama_fakultas":"";

              if(modul=="nama_fakultas"){
                if(!cek_patern.test(val)){
                   error_alert("Ilegal karakter","1. Jangan gunakan spasi di awal<br> 2. Karakter minimal 3 karakter, Max 20<br> 3. Karakter yang dijinkan hanyalah huruf, angka,underscore,garis datar dan spasi<br> 4. Field harus diisi tidak boleh kosong");
                   ajax_request=false;
                } else {
                  eksekusi(val);
                }
              } 
            }

            });

              function eksekusi(__val){
                _dataObj.value=__val;
                show_proses("Mengubah fakultas");
                $.ajax({
                  type:"POST",
                  url:"<?php echo base_url() ?>AN_ajax_staff/edit_fakultas",
                  data:_dataObj,
                  cache:false,
                  success: function(a){
                    if(a=="ok"){
                      __this.find("input").hide();
                      __this.siblings("span").html(_dataObj.value).fadeIn();
                    } else {
                      error_alert("Error tidak terduga","Pesan Error: <br>"+a);
                     
                    }
                    ajax_request=false;
                    hide_proses();
                  },
                  error: function(a,b,c){
                    error_alert("Error","Periksa koneksi anda. <br> Pesan error:<br>"+c);
                    ajax_request=false;
                    hide_proses();
                  }
                });
              }

            $(document).on("click",".slug-table .hapus_fakultas button",function(){
              if(!ajax_request){
              var id=$(this).parent().parent().attr("id_fakultas");
              konfirmasi("Hapus Data Fakultas","Anda yakin akan menghapus Data Fakultas ini?",hapus_fakultas,id);
             }
            });

            function hapus_fakultas(id){
              ajax_request=true;
              show_proses("Menghapus Data Fakultas");
              $.ajax({
                type:"POST",
                data:{"id_fakultas":id},
                url:"<?php echo base_url() ?>AN_ajax_staff/hapus_fakultas",
                cache:false,
                success:function(a){
                  if(a=="ok"){                    
                        show_proses("Berhasil Menghapus! Sedang Merefresh halaman");
                        window.location.reload();
                  } else {
                        error_alert("Error tidak terduga","Pesan error:<br>"+a);
                        ajax_request=false;
                        hide_proses();
                  }
                },
                error:function(a,b,c){
                        error_alert("Cek koneksi anda","Pesan error:<br>"+c);
                        ajax_request=false;
                        hide_proses();
                }
              });
            }
            <?php } ?>

            <?php if($npage==13){
            ?>

            $(".prodi-table").DataTable();
            $("#nama_prodi").keyup(function(){
              var prodi=$(this).val();
              });

            $(".tambah-prodi-btn").click(function(){   
            if(!ajax_request) { 
            ajax_request=true;          
              var _fakultas=$("#list_fakultas").val();
              var _prodi=$("#nama_prodi").val();
              if(!/^\w[a-zA-Z0-9 -]{2,50}$/.test(_prodi)){
                error_alert("Ilegal karakter","1. Jangan gunakan spasi di awal<br> 2. Karakter minimal 3 karakter, Max 50<br> 3. Karakter yang dijinkan hanyalah huruf, angka,underscore,garis datar dan spasi<br> 4. Field harus diisi tidak boleh kosong");
                ajax_request=false;
              } else{
                var _data={"list_fakultas":_fakultas,"nama_prodi":_prodi};
                  show_proses("Menambahkan Data Prodi...");
                  $.ajax({
                    type: "POST",
                    url:"<?php echo base_url() ?>An_ajax_staff/new_prodi",
                    data:_data,
                    cache:false,
                    success:function(a){
                      if(a=="ok"){
                        show_proses("Berhasil! Merefresh halaman");
                        window.location.reload();
                      }else{
                        error_alert("Error tidak terduga","Pesan error:<br>"+a);
                        ajax_request=false;
                        hide_proses();
                      }
                    },
                    error:function(a,b,c){
                        error_alert("Cek koneksi anda","Pesan error:<br>"+c);
                        ajax_request=false;
                        hide_proses();
                    }
                  });
              }
            }
            });

            $(document).on("click",".prodi-table .hapus_prodi button",function(){
              if(!ajax_request){
              var id=$(this).parent().parent().attr("id_prodi");
              konfirmasi("Hapus Data Prodi","Anda yakin akan menghapus Data Prodi ini?",hapus_prodi,id);
             }
            });

            function hapus_prodi(id){
              ajax_request=true;
              show_proses("Menghapus Data Prodi");
              $.ajax({
                type:"POST",
                data:{"id_prodi":id},
                url:"<?php echo base_url() ?>AN_ajax_staff/hapus_prodi",
                cache:false,
                success:function(a){
                  if(a=="ok"){                    
                        show_proses("Berhasil Menghapus! Sedang Merefresh halaman");
                        window.location.reload();
                  } else {
                        error_alert("Error tidak terduga","Pesan error:<br>"+a);
                        ajax_request=false;
                        hide_proses();
                  }
                },
                error:function(a,b,c){
                        error_alert("Cek koneksi anda","Pesan error:<br>"+c);
                        ajax_request=false;
                        hide_proses();
                }
              });
            }
            <?php } ?>

            /*Get the Unit list */

              $.ajax({
                type: "GET",
                url: "<?php echo base_url();?>AN_ajax_staff/get_unit",
                data:{id:$(this).val()}, 
                beforeSend :function(){
              $('.unit').find("option:eq(0)").html("Mohon tunggu..");
                },                         
                success: function (data) {
                  /*get response as json */
                   $('.unit').find("option:eq(0)").html("Pilih Unit");
                  var obj=jQuery.parseJSON(data);
                  $(obj).each(function()
                  {
                   var option = $('<option />');
                   option.attr('value', this.value).text(this.label);           
                   $('.unit').append(option);
                 });  
                  /*ends */
                }
              });

              /*Get the Fakultas list */

              $.ajax({
                type: "GET",
                url: "<?php echo base_url();?>AN_ajax_staff/get_fakultas",
                data:{id:$(this).val()}, 
                beforeSend :function(){
              $('.fakultas').find("option:eq(0)").html("Mohon tunggu..");
                },                         
                success: function (data) {
                  /*get response as json */
                   $('.fakultas').find("option:eq(0)").html("Pilih Fakultas");
                  var obj=jQuery.parseJSON(data);
                  $(obj).each(function()
                  {
                   var option = $('<option />');
                   option.attr('value', this.value).text(this.label);           
                   $('.fakultas').append(option);
                 });  
                  /*ends */
                }
              });

            /*Get the Prodi list */

              $('.fakultas').change(function(){
                $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>AN_ajax_staff/get_prodi",
                  data:{id:$(this).val()}, 
                  beforeSend :function(){
                $(".prodi option:gt(0)").remove(); 
                $(".prodi option:gt(0)").remove(); 
                $('.prodi').find("option:eq(0)").html("Mohon Tunggu..");
                  },                         
                  success: function (data) {
                    /*get response as json */
                     $('.prodi').find("option:eq(0)").html("Pilih Prodi");
                    var obj=jQuery.parseJSON(data);
                    $(obj).each(function()
                    {
                     var option = $('<option />');
                     option.attr('value', this.value).text(this.label);           
                     $('.prodi').append(option);
                   });  

                    /*ends */
                    
                  }
                });
              });

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


            function showHide() {
              if ($('#status').val() == '1') {
                  $("#list_fakultas").hide();
                  $("#list_unit").show();                        
              }else{
                $("#list_fakultas").show();
                  $("#list_unit").hide();  
              }
            }

            function urutkan_nomor(classTarget){

              setTimeout(function(){
               var no=1;
               $(classTarget).each(function(){

                $(this).text(no);
                no++

               });     
              },50)
            }


        }) /*---akhir code---*/
      </script>
</body>
</html>