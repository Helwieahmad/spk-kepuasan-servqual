<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

?>

       <!-- Main Footer -->
      <footer class="main-footer" style="background-color:#e27e3f ">
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
              var preloader = $('.spinner-wrapper-tenant');
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
            url:"<?php echo base_url() ?>AN_ajax_admin/upload_pop_up",
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

          <?php if ($npage==2) { ?>
           $("input:checkbox").click(function() {
              if ($(this).is(":checked")) {
              var group = "input:checkbox[class='" + $(this).attr("class") + "']";
              $(group).prop("checked", false);
              $(this).prop("checked", true);
              } else {
              $(this).prop("checked", false);
              }
              });

             $("input:checkbox").click(function() {
              if ($(this).is(":required")) {
              var group = "input:checkbox[class='" + $(this).attr("class") + "']";
              $(group).prop("required", false);
              $(this).prop("required", false);
              } else {
              $(this).prop("required", false);
              }
              });

         <?php } ?>

          <?php if($npage==3){ ?>       
            $(function() {
              $('button[type="submit"]').prop('disabled', true);
              $('#saran').on('input', function(e) {
                  if(this.value.length > 25) {
                      $('button[type="submit"]').prop('disabled', false);
                  } else {
                      $('button[type="submit"]').prop('disabled', true);
                  }
              });
            });    
            $(document).on("click","#simpan-saran",function(){
              if(!ajax_request){
                ajax_request=true;
              var id_saran=$("#id_saran").val();
              var nama_lengkap=$("#nama_lengkap").val();
              var email=$("#email").val();
              var saran=$("#saran").val();
              
              show_proses("Mengirim saran...");
              $.ajax({
              type:"POST",
              url:"<?php echo base_url() ?>AN_ajax_tenant/kirim_saran",
              data:{"id_saran":id_saran,"nama_lengkap":nama_lengkap,"email":email,"saran":saran},
              cache:false,
              success:function(a){
                if(a=="ok"){
                  show_proses("Berhasil!. Sedang merefresh halaman...");
                  window.location="<?php echo base_url(); ?>tenant";
                } else{
                  if(/^[\d]+$/.test(a)){
                    window.location.assign("<?php echo base_url(); ?>tenant/kirim_saran/"+a);

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

          /*------ awal edit tenant ---*/

           <?php if($npage==4){ ?>       
           var main_foto=false;
            var foto_box= new Dropzone("#modal-foto .area-foto",{ url: "<?php echo base_url() ?>AN_ajax_tenant/update_avatar_tenant",
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
                url:"<?php echo base_url() ?>AN_ajax_tenant/delete_foto_temp",
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
              url:"<?php echo base_url() ?>AN_ajax_tenant/ganti_avatar_tenant",
              data:{id_tenant:__id},
              cache:false,
              success:function(a,b,c){
                if(a=="ok"){
                console.log("Foto Berhasil Diganti: "+a);
                window.location.reload();
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
                  error_alert("Form belum terisi dengan benar","Masih ada input yang belum terisi dengan benar. Pastikan semuanya sudah tercentang hijau");
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
                  url:"<?php echo base_url() ?>AN_ajax_admin/edit_tenant",
                  data:{"id_tenant":id_tenant,"npm":npm,"password":password,"repassword":repassword,"nama_lengkap":nama_lengkap,"email":email,"status":status,"unit":unit,"prodi":prodi},
                  cache:false,
                  success:function(a){
                    if(a=="ok"){
                      hide_proses();
                   show_proses("Berhasil!, mengalihkan halaman...")
                    window.location="<?php echo base_url() ?>tenant/edit_tenant";
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
          
          <?php  } //Akhir untuk form user baru?>

            /*---Akhir Edit Tenant---*/

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