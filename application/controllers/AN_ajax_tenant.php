<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class AN_ajax_tenant extends CI_Controller{

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
		
		$this->load->helper(array('filter','url','file','tambahan','tanggal'));

		$this->load->library(array('Slugify'));

	}

	function kirim_saran(){
			$id_saran=changequote($this->input->post("id_saran"));
			$nama_lengkap=changequote($this->input->post("nama_lengkap"));
			$email=changequote($this->input->post("email"));
			$saran=changequote($this->input->post("saran"));
			$tanggal=tanggal();
			if ($id_saran==0) {

			$query=$this->db->query("INSERT INTO kotak_saran (nama,email,saran,tanggal) VALUES ('$nama_lengkap','$email','$saran','$tanggal')");
				echo "ok";
			}else{
				echo "Database Error...!!!";
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
	
	function delete_foto_temp(){
		$token_foto=changequote($this->input->post('foto_token'));
		$query=$this->db->query("SELECT * FROM foto_user_tmp WHERE token_foto='$token_foto'");
		if($query->num_rows()>0){
			$row=$query->row();
			$query2=$this->db->query("DELETE FROM foto_user_tmp WHERE token_foto='$token_foto'");
			if($query){
				unlink(FCPATH."an-component/media/upload-user-avatar/".$row->nama_foto);
			}
		}

	}

	function sesi(){
		echo $this->session->userdata('level_tenant');
	}

	
}