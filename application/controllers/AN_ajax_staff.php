<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class AN_ajax_staff extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		
		if(!$this->input->is_ajax_request()){
			exit('No direct script access allowed :)');
		}  

		if(!$this->session->userdata("login")){
			exit("Akses Ditolak!");
		}
		
		$this->load->helper(array('filter','url','file','tambahan'));

		$this->load->library(array('Slugify'));

		$this->load->model("staff/Tenant","ambil");
	}
	function delete_kuisioner(){
			$id=changequote($this->input->post("id"));
			$query=$this->db->query("DELETE FROM kuisioner WHERE id_kuisioner='$id'");
			echo "ok";
	}

	function kuisioner(){
			$id_kuisioner=changequote($this->input->post("id_kuisioner"));
			$periode=changequote($this->input->post("periode"));
			$tahun=changequote($this->input->post("tahun"));
			$aktif=changequote($this->input->post("aktif"));
			$deskripsi=changequote($this->input->post("deskripsi"));

			if($id_kuisioner==0){
				// "baru";
				$query=$this->db->query("INSERT INTO kuisioner (periode,tahun,aktif,deskripsi) VALUES ('$periode','$tahun','$aktif','$deskripsi')");
				echo "ok";

			} else {
				// "update";
				$query=$this->db->query("UPDATE kuisioner SET 
					aktif='$non_aktif'
				 ");
				if ($query) {
					$query2=$this->db->query("UPDATE kuisioner SET 
					periode='$periode',
					tahun='$tahun',
					aktif='$aktif',
					deskripsi='$deskripsi'
					WHERE id_kuisioner='$id_kuisioner'
				 ");
				}
				echo "ok";
			}
	}
	function delete_kriteria(){
			$id=changequote($this->input->post("id"));
			$query=$this->db->query("DELETE FROM kriteria WHERE id_kriteria='$id'");
			echo "ok";
	}

	function kriteria(){
			$id_kriteria=changequote($this->input->post("id_kriteria"));
			$kriteria=changequote($this->input->post("kriteria"));
			$id_dimensi=changequote($this->input->post("id_dimensi"));
			$aktif=changequote($this->input->post("aktif"));
			$keterangan=changequote($this->input->post("keterangan"));

			if($id_kriteria==0){
				// "baru";
				$query=$this->db->query("INSERT INTO kriteria (kriteria,id_dimensi,aktif,keterangan) VALUES ('$kriteria','$id_dimensi','$aktif','$keterangan')");
				echo "ok";
			} else {
				// "update";
				$query=$this->db->query("UPDATE kriteria SET 
					kriteria='$kriteria',
					id_dimensi='$id_dimensi',
					aktif='$aktif',
					keterangan='$keterangan'
					WHERE id_kriteria='$id_kriteria'
				 ");

				echo "ok";
			}
	}
	
	function delete_dimensi(){
			$id=changequote($this->input->post("id"));
			$query=$this->db->query("DELETE FROM dimensi WHERE id_dimensi='$id'");
			echo "ok";
	}

	function dimensi(){
			$id_dimensi=changequote($this->input->post("id_dimensi"));
			$dimensi=changequote($this->input->post("dimensi"));
			$keterangan=changequote($this->input->post("keterangan"));
			if($id_dimensi==0){
				// "baru";
				$query=$this->db->query("INSERT INTO dimensi (dimensi,keterangan) VALUES ('$dimensi','$keterangan')");
				if ($query) {
					echo "ok";
				}

			} else {
				// "update";
				$query=$this->db->query("UPDATE dimensi SET 
					dimensi='$dimensi',
					keterangan='$keterangan'
					WHERE id_dimensi='$id_dimensi'
				 ");

				echo "ok";
			}
	}

	function cek_npm(){
		$npm=trim(changequote($this->input->post('npm')));
		$query=$this->db->query("SELECT * FROM tenant WHERE npm='$npm'");
		if($query->num_rows()<1){
			echo "ok";
		} else{
			echo "terpakai";	
		} 
	}

	function avatar_tenant(){
		$config=array(
			"upload_path"=>FCPATH."an-component/media/upload-user-avatar/",
			"allowed_types"=>"gif|jpg|jpeg|png"
			);
		$this->load->library('upload', $config);
		 if ( ! $this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());

                       echo $error['error'];
                       echo "<br>";
                       echo base_url()."an-component/media/upload-user-avatar/";
                }
                else
                {

                	$nama_tenant=$this->upload->data('file_name');
                	$sesi_form=changequote($this->input->post('sesi'));
                	$token_foto=changequote($this->input->post('token_foto'));
                	$query=$this->db->query("INSERT into foto_user_tmp (nama_foto,token_foto,sesi_from) VALUES ('$nama_tenant','$token_foto','$sesi_form')");
                	echo 'ok';
                }
	}

	function new_tenant(){

		$npm=trim(changequote($this->input->post("npm")));
		$password=md5($this->input->post("password"));
		$nama_lengkap=changequote($this->input->post("nama_lengkap"));
		$email=changequote($this->input->post("email"));
		$status=changequote($this->input->post("status"));
		$unit=changequote($this->input->post("unit"));
		$prodi=changequote($this->input->post("prodi"));		
		$sessi=changequote($this->input->post("sessi"));
		$avatar_tenant=changequote($this->input->post("avatar_tenant"));
		$tanggal_daftar=date("Y-m-d",now());

		$user=$this->db->query("SELECT * FROM tenant WHERE npm='$npm'");
		if($user->num_rows()>0){
			echo "taken";
		}else{
			$photo="";
			$savatar=$this->db->query("SELECT * FROM foto_user_tmp WHERE sesi_from='$sessi'");
			if($avatar_tenant=="0"){
				//echo "No avatar";
				if($savatar->num_rows()>0){
					foreach($savatar->result_array() as $row){
						$this->db->query("DELETE FROM foto_user_tmp WHERE id_foto='$row[id_foto]'");
						unlink(FCPATH."an-component/media/upload-user-avatar/".$row["nama_foto"]);
					}
				}
				$photo="NoImage.jpg";
				} else {
					$row2=$savatar->row();
					$photo=$row2->nama_foto;
					$this->db->query("DELETE FROM foto_user_tmp WHERE sesi_from='$sessi'");

					//echo "ada avatar";
				}
				if ($unit >"0") {
								$query=$this->db->query("INSERT INTO tenant (npm,password,nama_lengkap,email,status,prodi,avatar_tenant,tanggal_daftar) 
									VALUES ('$npm','$password','$nama_lengkap','$email','$status','$unit','$photo','$tanggal_daftar')");
									if($query){
										echo "ok";
									}

				}else{
								$query=$this->db->query("INSERT INTO tenant (npm,password,nama_lengkap,email,status,prodi,avatar_tenant,tanggal_daftar) 
									VALUES ('$npm','$password','$nama_lengkap','$email','$status','$prodi','$photo','$tanggal_daftar')");
									if($query){
										echo "ok";
									}
				}
		}
	}

	function edit_tenant(){
		$id_tenant=trim(changequote($this->input->post("id_tenant")));
		$npm=trim(changequote($this->input->post("npm")));
		$password=md5($this->input->post("password"));
		$nama_lengkap=changequote($this->input->post("nama_lengkap"));
		$email=changequote($this->input->post("email"));
		$status=changequote($this->input->post("status"));
		$unit=changequote($this->input->post("unit"));
		$prodi=changequote($this->input->post("prodi"));		
		
		$user=$this->db->query("SELECT * FROM tenant WHERE level_tenant='1'");
		if($user->num_rows()>0){
			echo "taken";
		}else{	
		if ($status==1) {
			$query=$this->db->query("UPDATE tenant SET 
									npm='$npm',
									password='$password',
									nama_lengkap='$nama_lengkap',
									email='$email',
									status='$status',
									prodi='$unit' WHERE id_tenant='$id_tenant' ");
									if($query){
										echo "ok";
									}
		}else{
			$query=$this->db->query("UPDATE tenant SET 
									npm='$npm',
									password='$password',
									nama_lengkap='$nama_lengkap',
									email='$email',
									status='$status',
									prodi='$prodi' WHERE id_tenant='$id_tenant' ");
									if($query){
										echo "ok";
									}	
			}
		}
	}

	function update_avatar_tenant(){
		$config=array(
			"upload_path"=>FCPATH."an-component/media/upload-user-avatar/",
			"allowed_types"=>"gif|jpg|jpeg|png"
			);
		$this->load->library('upload', $config);
		 if ( ! $this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());

                       echo $error['error'];
                }
                else
                {
                	$id=changequote($this->input->post('id_tenant')); //????????????
                	$nama=$this->upload->data('file_name');
                	$token_foto=changequote($this->input->post('token_foto'));
                	$query=$this->db->query("INSERT INTO foto_user_tmp (nama_foto,token_foto,id_user) VALUES ('$nama','$token_foto','$id')");
                	echo 'ok';
                }
	}

	function ganti_avatar_tenant(){
		$id=changequote($this->input->post("id_tenant"));
		$cari=$this->db->query("SELECT * FROM foto_user_tmp WHERE id_user='$id' ORDER BY id_foto DESC");
		if($cari->num_rows()>0){
			$cari_foto_lama=$this->db->query("SELECT * FROM tenant WHERE id_tenant='$id'");
			$_row=$cari_foto_lama->row();
			$foto_lama=$_row->avatar_tenant;
			if($foto_lama!="NoImage.jpg"){
				unlink(FCPATH."an-component/media/upload-user-avatar/".$foto_lama);
			}
			$row=$cari->row();
			$query=$this->db->query("UPDATE tenant SET avatar_tenant='".$row->nama_foto."' WHERE id_tenant='$id' ");

			//Hapus SEMUA yg punya ID user sama
			$hapus=$this->db->query("DELETE FROM foto_user_tmp WHERE id_user='$id' ");
			if($hapus){
				echo "ok";
			}
		}
	}


	function delete_tenant(){
			$id=changequote($this->input->post("id"));
			$query=$this->db->query("DELETE FROM tenant WHERE id_tenant='$id'");
			echo "ok";
	}

	function baca_inbox(){
		$id=$this->input->post("id");
		$query=$this->db->get_where("kotak_saran",array("id"=>$id));

		$data=$query->row_array();

		$this->db->where("id",$id);
		$this->db->update("kotak_saran",array("dibaca"=>"Y"));

		$tgl=$data["tanggal"];
		$data["tanggal"]=date("F jS, Y",strtotime($tgl));
		$data["saran"]=nl2br($data["saran"]);

		echo json_encode($data);

	}

	function hapus_pesan(){
		$id=$this->input->post("id");
		$this->db->delete("kotak_saran",array("id"=>$id));
		echo "ok";
	}

	function new_status(){
		$nama_status=changequote($this->input->post("nama_status"));
		$query=$this->db->query("INSERT INTO status (nama_status) VALUES ('$nama_status')");
		if($query){
			echo "ok";
		}
	}

	function edit_statusss(){
		$id=changequote($this->input->post("id_status"));
		$val=changequote($this->input->post("value"));
		$modul=changequote($this->input->post("modul"));
		$exe=($modul=="nama_status")?"nama_status":"slug_tag";
		$query=$this->db->query("UPDATE status SET nama_status='$val' WHERE id_status='$id'");
		if($query){
			echo "ok";
			///echo "id=$id <br> val =$val <br> modul= $modul <br> exe= $exe";
		}

	}

	function hapus_status(){
		$id=changequote($this->input->post("id_status"));
		$query=$this->db->query("DELETE FROM status WHERE id_status='$id' ");
		if($query){
			echo "ok";
		}
	}

	function new_fakultas(){
		$nama_fakultas=changequote($this->input->post("nama_fakultas"));
		$query=$this->db->query("INSERT INTO fakultas (nama_fakultas) VALUES ('$nama_fakultas')");
		if($query){
			echo "ok";
		}
	}

	function edit_fakultas(){
		$id=changequote($this->input->post("id_fakultas"));
		$val=changequote($this->input->post("value"));
		$modul=changequote($this->input->post("modul"));
		$exe=($modul=="nama_fakultas")?"nama_fakultas":"slug_tag";
		$query=$this->db->query("UPDATE fakultas SET nama_fakultas='$val' WHERE id_fakultas='$id'");
		if($query){
			echo "ok";
			///echo "id=$id <br> val =$val <br> modul= $modul <br> exe= $exe";
		}

	}

	function hapus_fakultas(){
		$id=changequote($this->input->post("id_fakultas"));
		$query=$this->db->query("DELETE FROM fakultas WHERE id_fakultas='$id' ");
		if($query){
			echo "ok";
		}
	}

	function new_prodi(){
		$list_fakultas=changequote($this->input->post("list_fakultas"));
		$nama_prodi=changequote($this->input->post("nama_prodi"));
		$query=$this->db->query("INSERT INTO prodi (id_fakultas,nama_prodi) VALUES ('$list_fakultas','$nama_prodi')");
		if($query){
			echo "ok";
		}
	}

	function hapus_prodi(){
		$id=changequote($this->input->post("id_prodi"));
		$query=$this->db->query("DELETE FROM prodi WHERE id_prodi='$id' ");
		if($query){
			echo "ok";
		}
	}

	Public function get_unit()
	{
		  $result=$this->db->where('id_fakultas','8')
						->get('prodi')
						->result();
     
        $data=array();
		foreach($result as $r)
		{
			$data['value']=$r->id_prodi;
			$data['label']=$r->nama_prodi;
			$json[]=$data;
		}
		echo json_encode($json);
	}

	Public function get_fakultas()
	{
		$query=$this->db->get('fakultas');
        $result= $query->result();
        $data=array();
		foreach($result as $r)
		{
			$data['value']=$r->id_fakultas;
			$data['label']=$r->nama_fakultas;
			$json[]=$data;
		}
		echo json_encode($json);
	}

	Public function get_prodi()
	{
		  $result=$this->db->where('id_fakultas',$_POST['id'])
						->get('prodi')
						->result();
     
        $data=array();
		foreach($result as $r)
		{
			$data['value']=$r->id_prodi;
			$data['label']=$r->nama_prodi;
			$json[]=$data;
		}
		echo json_encode($json);
	}

	function sesi(){
		echo $this->session->userdata('level_user');
	}

}